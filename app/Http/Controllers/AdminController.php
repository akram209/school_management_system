<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        return view('admin.profile', [
            'user' => $user,
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents,
            'totalParents' => $totalParents,
            'totalClasses' => $totalClasses,
            'totalFees' => $totalFees,
            'students' => $students,
            'teachers' => $teachers
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
}
