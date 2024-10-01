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

    Route::get('/student/profile/{id}', [StudentController::class, 'profile'])->name('student.profile');
    Route::post('/storeStudentclass/{student}', [StudentController::class, 'setClass'])->name('student.storeclass');

    Route::get('/teacher/profile/{id}', [TeacherController::class, 'profile'])->name('teacher.profile');

    Route::get('/parent/profile/{id}', [ParentController::class, 'profile'])->name('parent.profile');
    Route::get('/parents/{student}', [ParentController::class, 'getParentsByStudentId'])->name('student.parents');

    Route::get('/class/{class}', [ClassController::class, 'show'])->name('class.show');
    Route::get('/student/class/{student}', [ClassController::class, 'getClassByStudentId'])->name('student.class');

    Route::get('/subjects/{student}', [SubjectController::class, 'getSubjectsByStudentId'])->name('student.subjects');

    Route::get('student/attendence/{student}', [AttendenceController::class, 'getAttendencesByStudentId'])->name('student.attendences');
    Route::get('teacher/take-attendence/{class}', [AttendenceController::class, 'takeAttendenceByClassId'])->name('teacher.take-attendence');


    Route::get('/teacher/exams/{teacher}/', [ExamController::class, 'getExamsByTeacherId'])->name('teacher.exams');
    Route::get('/student/exams/{student}', [ExamController::class, 'getExamsByStudentId'])->name('student.exams');
    Route::get('/exam/{teacher}', [ExamController::class, 'createByTeacher'])->name('teacher.create-exam');
    Route::post('/exam', [ExamController::class, 'store'])->name('exam.store');
    Route::get('exam/set-score/{exam}', [ExamController::class, 'setScore'])->name('exam.set-score');
    Route::get('teacher/{teacher}/exam/edit/{exam}', [ExamController::class, 'editByTeacher'])->name('teacher.edit-exam');
    Route::put('exam/update/{exam}', [ExamController::class, 'update'])->name('exam.update');
    Route::delete('exam/delete/{exam}', [ExamController::class, 'destroy'])->name('exam.destroy');

    Route::get('/teacher/assignments/{teacher}/', [AssignmentController::class, 'getAssignmentsByTeacherId'])->name('teacher.assignments');
    Route::get('/student/assignments/{student}', [AssignmentController::class, 'getAssignmentsByStudentId'])->name('student.assignments');
    Route::get('assignment/set-score/{assignment}', [AssignmentController::class, 'setScore'])->name('assignment.set-score');
    Route::get('teacher/{teacher}/assignment/edit/{assignment}', [AssignmentController::class, 'editByTeacher'])->name('teacher.edit-assignment');
    Route::put('assignment/update/{assignment}', [AssignmentController::class, 'update'])->name('assignment.update');
    Route::delete('assignment/delete/{assignment}', [AssignmentController::class, 'destroy'])->name('assignment.destroy');
    Route::get('/assignment/{teacher}', [AssignmentController::class, 'createByTeacher'])->name('teacher.create-assignment');
    Route::post('/assignment', [AssignmentController::class, 'store'])->name('assignment.store');
    Route::get('/timetable/{student}', [TimetableController::class, 'getTimetableByStudentId'])->name('student.timetable');
});


require __DIR__ . '/auth.php';
