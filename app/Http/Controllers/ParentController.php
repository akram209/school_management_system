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
        return $parents;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
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
            // 'code' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);
        // $permission = Permission::where('code', $request->code)->where('email', $request->email)->first();
        // if (!$permission) {
        //     return back()->withErrors(['code' => 'The code is not valid.']);
        // }
      

      

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            $path = Storage::disk('images')->put('parents', $file);
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
        }
       

        return $parent;
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $parent = ParentModel::find($id);
       
        return [$parent ,$parent->user ];
       
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $parent = ParentModel::find($id);
        return $parent;
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:30', 'min:3'],
            'last_name' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required'],
            // 'code' => ['required'],
            'image' => ['image', 'mimes:jpeg,png,jpg'],
            'phone' => ['required'],
            'address' => ['required'],
        ]);

        $parent = ParentModel::find($id);
        $parent->update([
            'user_id' => $parent->user_id,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        if (request()->hasFile('image')) {
            $file = request()->file('image');
            Storage::disk('images')->delete($parent->image);
            $path = Storage::disk('images')->put('parents', $file);
            $parent->user->update([
                'image' => $path,
            ]);
        }
        $parent->user->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'gender' => $request->gender,
            'role' => 'parent',
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return $parent;
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
       
    }
    public function getParentsByStudentId($id){

      $students = Student::with('parent')->find($id);
      if (!$students) {
        return response()->json(['message' => 'Class not found'], 404);
    }
      return $students->parent;
      
    }
}
