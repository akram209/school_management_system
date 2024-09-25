<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Models\Attendence;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{id}', [StudentController::class, 'profile'])->name('student.profile');
    Route::get('/parents/{student}', [ParentController::class, 'getParentsByStudentId'])->name('student.parents');
    Route::get('/subjects/{student}', [SubjectController::class, 'getSubjectsByStudentId'])->name('student.subjects');
    Route::post('/storeStudentclass/{student}', [StudentController::class, 'setClass'])->name('student.storeclass');
    Route::get('/class/{student}', [ClassController::class, 'getClassByStudentId'])->name('student.class');
    Route::get('/attendence/{student}', [AttendenceController::class, 'getAttendencesByStudentId'])->name('student.attendences');
    Route::get('/exams/{student}', [ExamController::class, 'getExamsByStudentId'])->name('student.exams');
    Route::get('/assignments/{student}', [AssignmentController::class, 'getAssignmentsByStudentId'])->name('student.assignments');
});


require __DIR__ . '/auth.php';
