<?php

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimetableController;
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
    Route::get('/student/profile/{id}', [StudentController::class, 'profile'])->name('student.profile');
    Route::post('/storeStudentclass/{student}', [StudentController::class, 'setClass'])->name('student.storeclass');
    Route::get('/teacher/profile/{id}', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::get('/parents/{student}', [ParentController::class, 'getParentsByStudentId'])->name('student.parents');
    Route::get('/class/{class}', [ClassController::class, 'show'])->name('class.show');
    Route::get('/student/class/{student}', [ClassController::class, 'getClassByStudentId'])->name('student.class');
    Route::get('/subjects/{student}', [SubjectController::class, 'getSubjectsByStudentId'])->name('student.subjects');
    Route::get('student/attendence/{student}', [AttendenceController::class, 'getAttendencesByStudentId'])->name('student.attendences');
    Route::get('teacher/take-attendence/{class}', [AttendenceController::class, 'takeAttendenceByClassId'])->name('teacher.take-attendence');


    // Route::get('/exam/{subject_id}/{class_id}', [ExamController::class, 'getExamsBySubjectIdAndClassId'])->name('attendence.create');
    Route::get('/teacher/exams/{teacher}/', [ExamController::class, 'getExamsByTeacherId'])->name('teacher.exams');
    Route::get('/student/exams/{student}', [ExamController::class, 'getExamsByStudentId'])->name('student.exams');
    Route::get('/teacher/assignments/{teacher}/', [AssignmentController::class, 'getAssignmentsByTeacherId'])->name('teacher.assignments');
    Route::get('/student/assignments/{student}', [AssignmentController::class, 'getAssignmentsByStudentId'])->name('student.assignments');
    Route::get('getAssignmentsByTeacherId/{id}', [AssignmentController::class, 'getAssignmentsByTeacherId']);
    Route::get('/timetable/{student}', [TimetableController::class, 'getTimetableByStudentId'])->name('student.timetable');
});


require __DIR__ . '/auth.php';
