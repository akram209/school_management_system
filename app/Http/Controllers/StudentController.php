<?php

namespace App\Http\Controllers;

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
        return $students;
        
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
    public function store(Request $request)
    {
       
        $request->validate([
            'firstname' => ['required', 'string', 'max:30', 'min:3'],
            'lastname' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            // 'code' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'class_id' => ['required', 'exists:classes,id'],
        ]);
        // $permission = Permission::where('code', $request->code)->where('email', $request->email)->first();
        // if (!$permission) {
        //     return back()->withErrors(['code' => 'The code is not valid.']);
        // }
        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $path = Storage::disk('images')->put('students', $file);
        }

        $user = User::create([
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'gender' => $request->gender,
            'role' => 'student',
            'email' => $request->email,
            'image' => $path,
            'password' => Hash::make($request->password),
        ]);

        $student = Student::create([
            'user_id' => $user->id,
            'class_id' => $request->class_id,

        ]);
       

        
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return $student;
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Student $student)
    {
        request()->validate([
            'firstname' => ['required', 'string', 'max:30', 'min:3'],
            'lastname' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            'code' => ['required'],
            'image' => [ 'image', 'mimes:jpeg,png,jpg'],
            'class_id' => ['required', 'exists:classes,id'],
        ]);
        $student->update([
            'user_id' => $student->user_id,
            'class_id' => request()->class_id,
        ]);

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            Storage::disk('images')->delete($student->image);
            $path = Storage::disk('images')->put('students', $file);
            $student->user->update([
                'image' => $path,
            ]);
        }
        $student->user->update([
            'first_name' => request()->first_name,
            'last_name' => request()->last_name,
            'gender' => request()->gender,
            'role' => 'student',
            'email' => request()->email,
            'password' => Hash::make(request()->password),
        ]);

        return $student;



 


     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
   
        Storage::disk('images')->delete($student->user->image);
        $student->user->delete();
        $student->delete();
    }
}
