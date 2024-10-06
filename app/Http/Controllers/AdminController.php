<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\Fee;
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

        return view('admin.profile', [
            'user' => $user,
            'totalTeachers' => $totalTeachers,
            'totalStudents' => $totalStudents,
            'totalParents' => $totalParents,
            'totalClasses' => $totalClasses,
            'totalFees' => $totalFees
        ]);
    }
}
