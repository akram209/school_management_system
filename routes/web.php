<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\NotificationController;
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

Route::get('/dashboard/{user}', [AdminController::class, 'profile'])->middleware(['auth', 'verified'])->name('admin.profile');
Route::get('/permissions', [AdminController::class, 'permissions'])->middleware(['auth', 'verified'])->name('admin.permissions');
Route::get('/notification/create', [NotificationController::class, 'create'])->middleware(['auth', 'verified'])->name('admin.notification.create');
Route::post('/notification', [NotificationController::class, 'store'])->middleware(['auth', 'verified'])->name('admin.notification.store');
Route::get('/notification', [NotificationController::class, 'index'])->middleware(['auth', 'verified'])->name('admin.notification.index');




Route::middleware('auth')->group(function () {

    Route::get('/student/profile/{id}', [StudentController::class, 'profile'])->name('student.profile');
    Route::post('/storeStudentclass/{student}', [StudentController::class, 'setClass'])->name('student.storeclass');
    Route::get('/student', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/student', [StudentController::class, 'store'])->name('student.store');
    Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
    Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');



    Route::get('/teacher/profile/{id}', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('/teacher/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
    Route::get('/teacher/{teacher}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('/teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('/teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
    Route::get('/assign-teachers', [TeacherController::class, 'assignTeachers'])->name('teacher.assign');

    Route::get('/parent/profile/{id}', [ParentController::class, 'profile'])->name('parent.profile');
    Route::get('/parents/{student}', [ParentController::class, 'getParentsByStudentId'])->name('student.parents');

    Route::get('/class', [ClassController::class, 'index'])->name('class.index');
    Route::get('/class/create', [ClassController::class, 'create'])->name('class.create');
    Route::get('/class/{class}', [ClassController::class, 'show'])->name('class.show');
    Route::get('/student/class/{student}', [ClassController::class, 'getClassByStudentId'])->name('student.class');
    Route::post('/class', [ClassController::class, 'store'])->name('class.store');

    Route::get('/subjects/{student}', [SubjectController::class, 'getSubjectsByStudentId'])->name('student.subjects');

    Route::get('student/attendence/{student}', [AttendenceController::class, 'getAttendencesByStudentId'])->name('student.attendences');
    Route::get('teacher/{teacher}/take-attendence/{class}', [AttendenceController::class, 'takeAttendenceByClassId'])->name('teacher.take-attendence');


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
    Route::get('/assignment/create', [AssignmentController::class, 'create'])->name('assignment.create');
    Route::get('/assignment/{teacher}', [AssignmentController::class, 'createByTeacher'])->name('teacher.create-assignment');
    Route::get('/assignment', [AssignmentController::class, 'index'])->name('assignment.index');
    Route::post('/assignment', [AssignmentController::class, 'store'])->name('assignment.store');
    Route::post('student/{student}/assignment/{assignment}/', [AssignmentController::class, 'uploadAssignment'])->name('assignment.upload');
    Route::get('/student/{student}/assignment/{assignment}/', [AssignmentController::class, 'viewAssignment'])->name('assignment.view');
    Route::delete('/student/{student}/assignment/{assignment}/', [AssignmentController::class, 'deleteAssignment'])->name('assignment.delete');

    Route::get('/timetable/create', [TimetableController::class, 'create'])->name('timetable.create');
    Route::get('/timetable/{student}', [TimetableController::class, 'getTimetableByStudentId'])->name('student.timetable');
    Route::get('/timetable-class/{class}', [TimetableController::class, 'getTimetableByClassId'])->name('class.timetable');
    Route::get('/timetable', [TimetableController::class, 'index'])->name('timetable.index');
    Route::post('/timetable', [TimetableController::class, 'store'])->name('timetable.store');
    Route::get('/timetable/{timetable}/edit', [TimetableController::class, 'edit'])->name('timetable.edit');
    Route::put('/timetable/{timetable}', [TimetableController::class, 'update'])->name('timetable.update');
    Route::delete('/timetable/{timetable}', [TimetableController::class, 'destroy'])->name('timetable.destroy');
});


require __DIR__ . '/auth.php';
