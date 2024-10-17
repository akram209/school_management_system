<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Fee;
use App\Models\ParentModel;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class AdminController extends Controller
{


    public function profile(User $user)
    {
        $totalStudents = User::where('role', 'student')->count();
        $totalTeachers = User::where('role', 'teacher')->count();
        $totalParents = User::where('role', 'parent')->count();
        $totalClasses = ClassModel::all()->count();
        $totalFees = Fee::where('status', 'paid')->count();
        $students = Student::with('user', 'fee')->whereHas('fee', function ($query) {
            $query->where('status', 'unpaid');
        })->get();
        $teachers = Teacher::whereHas('user', function ($query) {
            $query->where('role', 'teacher');
        })->get();
        $options1 = [
            'chart_title' => 'Users by months',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',

        ];
        $options2 = [
            'chart_title' => 'Users by roles',
            'report_type' => 'group_by_string',
            'model' => 'App\Models\User',
            'group_by_field' => 'role',
            'chart_type' => 'pie',
        ];



        $chart1 = new LaravelChart($options1);
        $chart2 = new LaravelChart($options2);

        return view('admin.profile', [
            'user' => $user,
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents,
            'totalParents' => $totalParents,
            'totalClasses' => $totalClasses,
            'totalFees' => $totalFees,
            'students' => $students,
            'teachers' => $teachers,
            'chart1' => $chart1,
            'chart2' => $chart2
        ]);
    }

    public function permissions()
    {
        return view('admin.permissions');
    }

    public function notifications()
    {
        return view('admin.notifications');
    }
    public function assignTeachers()
    {

        $teachers = Teacher::all();
        $teachers = $teachers->load('user');
        $classes = ClassModel::all();
        $subjects = Subject::all();
        $classSubjectTeachers = DB::table('class_subject_teacher')
            ->join('teachers', 'class_subject_teacher.teacher_id', '=', 'teachers.id')
            ->join('users', 'teachers.user_id', '=', 'users.id')
            ->join('classes', 'class_subject_teacher.class_id', '=', 'classes.id')
            ->join('subjects', 'class_subject_teacher.subject_id', '=', 'subjects.id')
            ->select(
                'class_subject_teacher.*',
                DB::raw("CONCAT(users.first_name, ' ', users.last_name) as teacher_name"),
                'users.email as teacher_email',
                'classes.name as class_name',
                'subjects.name as subject_name'
            )
            ->get();


        return view('admin.assign-teacher', compact('teachers', 'classes', 'subjects', 'classSubjectTeachers'));
    }
    public function storeTeachersClassSubject(Request $request)
    {
        $request->validate([
            'teacher_id' => ['required'],
            'class_id' => ['required'],
            'subject_id' => ['required']
        ]);
        $exists = DB::table('class_subject_teacher')->where('teacher_id', $request->teacher_id)
            ->where('class_id', $request->class_id)
            ->where('subject_id', $request->subject_id)->get();
        if (count($exists) > 0) {
            return redirect()->back()->with('error', 'Teacher already assigned');
        }
        DB::table('class_subject_teacher')->insert([
            'teacher_id' => $request->teacher_id,
            'class_id' => $request->class_id,
            'subject_id' => $request->subject_id
        ]);
        return redirect()->back()->with('success', 'Teacher assigned successfully');
    }
    public function deleteTeachersClassSubject($teacher_id, $class_id, $subject_id)
    {

        DB::table('class_subject_teacher')->where('teacher_id', $teacher_id)->where('class_id', $class_id)->where('subject_id', $subject_id)->delete();

        return redirect()->back();
    }




    public function assignParents()
    {

        $parents = ParentModel::all();
        $parents = $parents->load('user');
        $students = Student::all();
        $students = $students->load('user');

        $parentStudents = DB::table('parent_student')
            ->join('students', 'parent_student.student_id', '=', 'students.id')
            ->join('users', 'students.user_id', '=', 'users.id')
            ->join('parents', 'parent_student.parent_id', '=', 'parents.id')
            ->join('users as parent_user', 'parents.user_id', '=', 'parent_user.id')
            ->select(
                'parent_student.*',
                'students.*',
                'users.first_name as student_first_name',
                'users.last_name as student_last_name',
                'users.email as student_email',
                'parent_user.first_name as parent_first_name',
                'parent_user.last_name as parent_last_name',
                'parent_user.email as parent_email',
                'parent_user.id as parent_user_id'
            )->get();




        return view('admin.assign-parent', compact('parents', 'students', 'parentStudents'));
    }
    public function storeParentsStudent(Request $request)
    {
        $request->validate([
            'parent_id' => ['required'],
            'student_id' => ['required']
        ]);
        $exists = DB::table('parent_student')->where('parent_id', $request->parent_id)
            ->where('student_id', $request->student_id)->get();
        if (count($exists) > 0) {
            return redirect()->back()->with('error', 'Parent already assigned');
        }
        DB::table('parent_student')->insert([
            'parent_id' => $request->parent_id,
            'student_id' => $request->student_id
        ]);
        return redirect()->back()->with('success', 'Parent assigned successfully');
    }
    public function deleteParentsStudent($parent_id, $student_id)
    {

        DB::table('parent_student')->where('parent_id', $parent_id)->where('student_id', $student_id)->delete();

        return redirect()->back();
    }
    public function changeInfo()
    {


        return view('admin.change-info');
    }
    public function updateInfo(Request $request)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg'],
            'gender' => ['in:male,female'],

        ]);
        if ($request->hasFile('image')) {
            if ($request->user()->image) {
                Storage::disk('images')->delete($request->user()->image);
            }
            $file = $request->file('image');
            $image = Storage::disk('images')->put('admin', $file);
        }
        $request->user()->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'image' => $image ?? null
        ]);
        return redirect()->back()->with('success', 'Info updated successfully');
    }
}
