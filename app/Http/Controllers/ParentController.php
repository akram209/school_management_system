<?php

namespace App\Http\Controllers;

use App\Models\ParentModel;
use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = ParentModel::all();
        return view('parent.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parent.create');
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
            'phone' => ['required', 'numeric', 'unique:parents,phone'],
            'address' => ['required'],
        ]);





        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $path = Storage::disk('images')->put('parents', $file);
        }
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'role' => 'parent',
            'email' => $request->email,
            'image' => $path,
            'password' => Hash::make($request->password),
        ]);
        $parent = ParentModel::create([
            'user_id' => $user->id,
            'phone' => $request->phone,
            'address' => $request->address,

        ]);
        return redirect()->back()->with('success', 'Parent created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $parent = ParentModel::find($id);
        $parent->load('user', 'students.user');

        return view('parent.show', compact('parent'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parent = ParentModel::find($id);
        $parent->load('user');
        return view('parent.edit', compact('parent'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ParentModel $parent, Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:30', 'min:3'],
            'last_name' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'phone' => ['required', 'numeric', 'unique:parents,phone'],
            'address' => ['required'],
        ]);




        if (request()->hasFile('image')) {
            $file = request()->file('image');
            if ($parent->path) {
                Storage::disk('images')->delete($parent->path);
            }
            $path = Storage::disk('images')->put('parents', $file);
        }
        $parent->update([
            'user_id' => $parent->user_id,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        $parent->user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'role' => 'parent',
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'path' => $path,
        ]);


        return redirect()->back()->with('success', 'Parent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $parent = ParentModel::find($id);
        Storage::disk('images')->delete($parent->user->image);
        $parent->user->delete();
        $parent->delete();
        return redirect()->back()->with('success', 'parent deleted successfully');
    }
    public function getParentsByStudentId(Student $student)
    {
        $student = $student->load('parents.user');
        $parents = $student->parents;

        return view('student.parents', ['parents' => $parents]);
    }
    public function profile($parent_id)
    {
        $parent = ParentModel::with(['user', 'students.user', 'students.fee'])->where('user_id', $parent_id)->first();

        if (!$parent) {
            return response()->json(['message' => 'Parent not found'], 404);
        }

        return view('parent.profile', ['parent' => $parent]);
    }
}
