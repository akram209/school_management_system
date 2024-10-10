<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        $teachers->load('user');

        return view('teacher.index', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Teacher $teacher, Request $request)
    {
        // Validate the request
        request()->validate([
            'first_name' => ['required', 'string', 'max:30', 'min:3'],
            'last_name' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'image' => ['required', 'image'],
            'phone' => ['required', 'numeric'],
            'address' => ['required'],
            'qualification' => ['required'],
            'experience_years' => ['required'],
            'salary' => ['required'],
        ]);


        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $image = Storage::disk('images')->put('teachers', $file);
        }

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'role' => 'teacher',
            'email' => $request->email,
            'image' => $image,
            'password' => Hash::make(request()->password),
        ]);

        $teacher = Teacher::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
            'address' => $request->address,
            'qualification' => $request->qualification,
            'experience_years' => $request->experience_years,
            'status' => 'unpaid',
            'salary' => $request->salary,
        ]);
        return redirect()->back()->with('success', 'Teacher created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        $teacher->load('user');
        return view('teacher.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {

        $teacher->load('user');
        return view('teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Teacher $teacher, Request $request)
    {
        // Validate the request
        request()->validate([
            'first_name' => ['required', 'string', 'max:30', 'min:3'],
            'last_name' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'image' => ['image'],
            'phone' => ['required', 'numeric', 'unique:teachers,phone,'],
            'status' => ['required'],
            'password' => ['required'],
            'address' => ['required'],
            'qualification' => ['required'],
            'experience_years' => ['required'],
            'salary' => ['required'],
        ]);
        $user = User::find($teacher->user_id);

        if (request()->hasFile('image')) {
            if ($teacher->user->image) {
                Storage::disk('images')->delete($teacher->user->image);
            }
            $file = request()->file('image');
            $image = Storage::disk('images')->put('teachers', $file);
        }

        if (!request()->hasFile('image')) {
            $image = $teacher->user->image;
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'email' => $request->email,
            'image' => $image,
            'password' => Hash::make($request->password),
        ]);

        $teacher->update([
            'phone' => $request->phone,
            'address' => $request->address,
            'qualification' => $request->qualification,
            'experience_years' => $request->experience_years,
            'status' => $request->status,
            'salary' => $request->salary,
        ]);
        return redirect()->back()->with('success', 'Teacher updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {

        Storage::disk('images')->delete($teacher->user->image);
        $teacher->delete();
        $teacher->user->delete();
        return redirect()->back()->with('success', 'Teacher deleted successfully');
    }
    public function getTeachersByClassId($id)
    {
        $class = ClassModel::with('teachers')->find($id);
        if (!$class) {
            return response()->json(['message' => 'Class not found'], 404);
        }
        return $class->teachers;
    }
    public function profile($userId)
    {
        $teacher = Teacher::with(['user', 'subjects', 'timetables.class'])->where('user_id', $userId)->first();
        return view('teacher.profile', ['teacher' => $teacher]);
    }
    public function assignTeachers()
    {
        $teachers = Teacher::all();
        $classes = ClassModel::all();
        $subjects = Subject::all();
        return view('teacher.assign', compact('teachers', 'classes', 'subjects'));
    }
}
