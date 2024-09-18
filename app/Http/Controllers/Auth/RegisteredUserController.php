<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Fee;
use App\Models\Permission;
use App\Models\Student;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {


        $request->validate([
            'firstname' => ['required', 'string', 'max:30', 'min:3'],
            'lastname' => ['required', 'string', 'max:30', 'min:3'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'code' => ['required'],
            'image' => ['required', 'image', 'mimes:jpeg,png,jpg'],
        ]);
        $permission = Permission::where('code', $request->code)->where('email', $request->email)->first();
        if (!$permission) {
            return back()->withErrors(['code' => 'The code is not valid.']);
        }
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
            'image' => $path,
        ]);

        $student = Student::create([
            'user_id' => $user->id,


        ]);
        session()->put('class_id', $student->class_id);
        Fee::Create([
            'student_id' => $student->id,
            'status' => 'unpaid'
        ]);
        Auth::login($user);

        return redirect(route('student.profile'));
    }
}
