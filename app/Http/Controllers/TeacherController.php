<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
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
        $teacher = Teacher::all();
        return $teacher;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Teacher $teacher)
    {
        // Validate the request
        request()->validate([
            'first_name' => ['required', 'string', 'max:30', 'min:3'],
            'last_name' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            // 'code' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'phone' => ['required'],
            'address' => ['required'],
            'qualification' => ['required'],
            'experience_years' => ['required'],
            'status' => ['required'],
            'salary' => ['required'],
            'subject_id' => ['required', 'exists:subjects,id'],
        ]);
        // $permission = Permission::where('code', $request->code)->where('email', $request->email)->first();
        // if (!$permission) {
        //     return back()->withErrors(['code' => 'The code is not valid.']);
        // }

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $path = Storage::disk('images')->put('teachers', $file);
        }

        $user = User::create([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'gender' => request()->gender,
            'role' => 'teacher',
            'email' => request()->email,
            'image' => $path,
            'password' => Hash::make(request()->password),
        ]);

        $teacher = Teacher::create([
            'user_id' => $user->id,
            'phone' => request()->phone,
            'address' => request()->address,
            'qualification' => request()->qualification,
            'experience_years' => request()->experience_years,
            'status' => request()->status,
            'salary' => request()->salary,
            'subject_id' => request()->subject_id,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        return $teacher;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Teacher $teacher)
    {
        // Validate the request
        request()->validate([
            'first_name' => ['required', 'string', 'max:30', 'min:3'],
            'last_name' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            // 'code' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg'],
            'phone' => ['required'],
            'address' => ['required'],
            'qualification' => ['required'],
            'experience_years' => ['required'],
            'status' => ['required'],
            'salary' => ['required'],
            'subject_id' => ['required', 'exists:subjects,id'],
        ]);

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            Storage::disk('images')->delete($teacher->user->image);
            $path = Storage::disk('images')->put('teachers', $file);
            $teacher->user->update([
                'image' => $path,
            ]);
        }

        $teacher->update([
            'user_id' => $teacher->user_id,
            'phone' => request()->phone,
            'address' => request()->address,
            'qualification' => request()->qualification,
            'experience_years' => request()->experience_years,
            'status' => request()->status,
            'salary' => request()->salary,
            'subject_id' => request()->subject_id,
        ]);


        $teacher->user->update([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'gender' => request()->gender,
            'email' => request()->email,
            'password' => Hash::make(request()->password),
        ]);

        return $teacher;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {

        Storage::disk('images')->delete($teacher->user->image);
        $teacher->delete();
        $teacher->user->delete();
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
}
