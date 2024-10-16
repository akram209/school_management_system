<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Fee;
use App\Models\Permission;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        $students->load('user', 'class', 'fee');
        return view('student.index', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = ClassModel::all();
        return view('student.create', ['classes' => $classes]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'first_name' => ['required', 'string', 'max:30', 'min:3'],
            'last_name' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'class_id' => ['required', 'exists:classes,id'],
        ]);

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $image = Storage::disk('images')->put('students', $file);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'role' => 'student',
            'email' => $request->email,
            'image' => $image,
            'password' => Hash::make($request->password),
        ]);

        $student = Student::create([
            'user_id' => $user->id,
            'class_id' => $request->class_id,

        ]);
        Fee::create([
            'student_id' => $student->id,
            'status' => 'unpaid',
        ]);

        return redirect()->back()->with('success', 'Student created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('user', 'class', 'fee', 'parents.user');

        return view('student.show', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {

        $classes = ClassModel::all();
        return view('student.edit', ['student' => $student, 'classes' => $classes]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Student $student, Request $request)
    {
        request()->validate([
            'first_name' => ['required', 'string', 'max:30', 'min:3'],
            'last_name' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'class_id' => ['required', 'exists:classes,id'],
        ]);
        $student->update([
            'user_id' => $student->user_id,
            'class_id' => request()->class_id,
        ]);

        if (request()->hasFile('image')) {
            if ($student->user->image) {
                Storage::disk('images')->delete($student->user->image);
            }
            $file = request()->file('image');
            $image = Storage::disk('images')->put('students', $file);
        }

        if (!request()->hasFile('image')) {
            $image = $student->user->image;
        }
        $student->user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'image' => $image
        ]);

        return redirect()->back()->with('success', 'Student updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {

        Storage::disk('images')->delete($student->user->image);
        $student->user->delete();
        $student->delete();
        return redirect()->back()->with('success', 'Student deleted successfully');
    }
    public function profile($id)
    {
        $student = Student::with(['user',  'class.timetable.teacher',  'class.timetable.subject'])->where('user_id', $id)->first();

        return view('student.profile', ['student' => $student]);
    }

    public function setClass(Student $student, Request $request)
    {

        $student->update([
            'class_id' => $request->class_id,
        ]);
        return redirect()->route('student.profile', $student->user_id);
    }




    // Api endpoint 
    public function getStudentresults(Student $student)
    {

        $student = $student->load('attendence', 'assignments');

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return response()->json($student);
    }
    public function changeInfo(Request $request)
    {

        $student = Student::where('user_id', $request->user()->id)->first();;
        return view('student.change-info', compact('student'));
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
            $image = Storage::disk('images')->put('students', $file);
            $request->user()->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,
                'image' => $image,
            ]);
        }
        if (!$request->hasFile('image')) {
            $request->user()->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'gender' => $request->gender,

            ]);
        }

        return redirect()->back()->with('success', 'Info updated successfully');
    }
}
