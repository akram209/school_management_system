<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Fee;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

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
}
