<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\TimetableController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard/{user}', [AdminController::class, 'profile'])->middleware(['auth', 'verified', 'isAdmin'])->name('admin.profile');
Route::get('/permissions', [AdminController::class, 'permissions'])->middleware(['auth', 'verified', 'isAdmin'])->name('admin.permissions');
Route::get('/notification/create', [NotificationController::class, 'create'])->middleware(['auth', 'verified', 'isAdmin'])->name('admin.notification.create');
Route::post('/notification', [NotificationController::class, 'store'])->middleware(['auth', 'verified', 'isAdmin'])->name('admin.notification.store');
Route::get('/notification', [NotificationController::class, 'index'])->middleware(['auth', 'verified', 'isAdmin'])->name('admin.notification.index');
Route::get('/teacher-class-subject', [AdminController::class, 'assignTeachers'])->middleware(['auth', 'verified', 'isAdmin'])->name('admin.teacher.assign');
Route::post('/teacher-class-subject', [AdminController::class, 'storeTeachersClassSubject'])->middleware(['auth', 'verified'])->name('class-subject-teacher.store');
Route::delete('/teacher-class-subject{teacher}/{class}/{subject}', [AdminController::class, 'deleteTeachersClassSubject'])->middleware(['auth', 'verified', 'isAdmin'])->name('class-subject-teacher.destroy');
Route::get('/parent-student', [AdminController::class, 'assignParents'])->middleware(['auth', 'verified', 'isAdmin'])->name('admin.parent.assign');
Route::post('/parent-student', [AdminController::class, 'storeParentsStudent'])->middleware(['auth', 'verified', 'isAdmin'])->name('parent-student.store');
Route::delete('/parent-student{parent}/{student}', [AdminController::class, 'deleteParentsStudent'])->middleware(['auth', 'verified', 'isAdmin'])->name('parent-student.destroy');




Route::middleware('auth')->group(function () {

    Route::get('/student/profile/{id}', [StudentController::class, 'profile'])->name('student.profile');
    Route::post('/storeStudentclass/{student}', [StudentController::class, 'setClass'])->name('student.storeclass');
    Route::middleware('isAdmin')->group(function () {
        Route::get('/student', [StudentController::class, 'index'])->name('student.index');
        Route::get('/student/create', [StudentController::class, 'create'])->name('student.create');
        Route::post('/student', [StudentController::class, 'store'])->name('student.store');
        Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
        Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
        Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
        Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
    });



    Route::get('/teacher/profile/{id}', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::middleware('isAdmin')->group(function () {
        Route::get('/teacher', [TeacherController::class, 'index'])->name('teacher.index');
        Route::get('/teacher/create', [TeacherController::class, 'create'])->name('teacher.create');
        Route::post('/teacher', [TeacherController::class, 'store'])->name('teacher.store');
        Route::get('/teacher/{teacher}', [TeacherController::class, 'show'])->name('teacher.show');
        Route::get('/teacher/{teacher}/edit', [TeacherController::class, 'edit'])->name('teacher.edit');
        Route::put('/teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
        Route::delete('/teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');
        Route::get('/assign-teachers', [TeacherController::class, 'assignTeachers'])->name('teacher.assign');
    });
    Route::get('/parent/profile/{id}', [ParentController::class, 'profile'])->name('parent.profile');
    Route::get('/parents/{student}', [ParentController::class, 'getParentsByStudentId'])->name('student.parents');
    Route::middleware('isAdmin')->group(function () {
        Route::get('/parent', [ParentController::class, 'index'])->name('parent.index');
        Route::get('/parent/create', [ParentController::class, 'create'])->name('parent.create');
        Route::post('/parent', [ParentController::class, 'store'])->name('parent.store');
        Route::get('/parent/{parent}', [ParentController::class, 'show'])->name('parent.show');
        Route::get('/parent/{parent}/edit', [ParentController::class, 'edit'])->name('parent.edit');
        Route::put('/parent/{parent}', [ParentController::class, 'update'])->name('parent.update');
        Route::delete('/parent/{parent}', [ParentController::class, 'destroy'])->name('parent.destroy');
    });
    Route::middleware('isAdmin')->group(function () {
        Route::get('/class', [ClassController::class, 'index'])->name('class.index');
        Route::get('/class/create', [ClassController::class, 'create'])->name('class.create');
    });
    Route::get('/class/{class}', [ClassController::class, 'show'])->name('class.show');
    Route::get('/student/class/{student}', [ClassController::class, 'getClassByStudentId'])->name('student.class');
    Route::post('/class', [ClassController::class, 'store'])->name('class.store');

    Route::get('/subjects/{student}', [SubjectController::class, 'getSubjectsByStudentId'])->name('student.subjects');

    Route::get('student/attendence/{student}', [AttendenceController::class, 'getAttendencesByStudentId'])->name('student.attendences');
    Route::get('teacher/{teacher}/take-attendence/{class}', [AttendenceController::class, 'takeAttendenceByClassId'])->name('teacher.take-attendence');
    Route::middleware('isAdmin')->group(function () {
        Route::get('admin/students-attendence/', [AttendenceController::class, 'adminStudentsAttendence'])->name('admin.students-attendence');
        Route::get('admin/teachers-attendence/', [AttendenceController::class, 'adminTeachersAttendence'])->name('admin.teachers-attendence');
    });

    Route::get('/teacher/exams/{teacher}/', [ExamController::class, 'getExamsByTeacherId'])->name('teacher.exams');
    Route::get('/student/exams/{student}', [ExamController::class, 'getExamsByStudentId'])->name('student.exams');
    Route::get('/exam-create/{teacher}', [ExamController::class, 'createByTeacher'])->name('teacher.create-exam');
    Route::post('/exam', [ExamController::class, 'store'])->name('exam.store');
    Route::get('exam/set-score/{exam}', [ExamController::class, 'setScore'])->name('exam.set-score');
    Route::get('teacher/{teacher}/exam/edit/{exam}', [ExamController::class, 'editByTeacher'])->name('teacher.edit-exam');
    Route::middleware('isAdmin')->group(function () {

        Route::put('exam/update/{exam}', [ExamController::class, 'update'])->name('exam.update');
        Route::delete('exam/delete/{exam}', [ExamController::class, 'destroy'])->name('exam.destroy');
        Route::get('/exam', [ExamController::class, 'index'])->name('exam.index');
        Route::get('/exam/create', [ExamController::class, 'create'])->name('exam.create');
        Route::get('/exam/{exam}', [ExamController::class, 'show'])->name('exam.show');
        Route::get('/exam/{exam}/edit', [ExamController::class, 'edit'])->name('exam.edit');
        Route::put('/exam/{exam}', [ExamController::class, 'update'])->name('admin.exam.update');
        Route::delete('/exam/{exam}', [ExamController::class, 'destroy'])->name('admin.exam.destroy');
    });
    Route::get('/assignment/{assignment}/edit', [AssignmentController::class, 'edit'])->name('assignment.edit');
    Route::get('/teacher/assignments/{teacher}/', [AssignmentController::class, 'getAssignmentsByTeacherId'])->name('teacher.assignments');
    Route::get('/student/assignments/{student}', [AssignmentController::class, 'getAssignmentsByStudentId'])->name('student.assignments');
    Route::get('assignment/set-score/{assignment}', [AssignmentController::class, 'setScore'])->name('assignment.set-score');
    Route::get('teacher/{teacher}/assignment/edit/{assignment}', [AssignmentController::class, 'editByTeacher'])->name('teacher.edit-assignment');

    Route::put('assignment/update/{assignment}', [AssignmentController::class, 'update'])->name('assignment.update');
    Route::delete('assignment/delete/{assignment}', [AssignmentController::class, 'destroy'])->name('assignment.destroy');
    Route::get('/assignment/create', [AssignmentController::class, 'create'])->name('assignment.create');
    Route::get('/assignment/create/{teacher}', [AssignmentController::class, 'createByTeacher'])->name('teacher.create-assignment');
    Route::get('/assignment', [AssignmentController::class, 'index'])->name('assignment.index');
    Route::post('/assignment', [AssignmentController::class, 'store'])->name('assignment.store');
    Route::get('/assignment/{assignment}/edit', [AssignmentController::class, 'edit'])->name('assignment.edit');
    Route::get('/assignment/{assignment}', [AssignmentController::class, 'show'])->name('assignment.show');
    Route::post('student/{student}/assignment/{assignment}/', [AssignmentController::class, 'uploadAssignment'])->name('assignment.upload');
    Route::get('/student/{student}/assignment/{assignment}/', [AssignmentController::class, 'viewAssignment'])->name('assignment.view');
    Route::delete('/student/{student}/assignment/{assignment}/', [AssignmentController::class, 'deleteAssignment'])->name('assignment.delete');

    Route::get('/timetable/create', [TimetableController::class, 'create'])->name('timetable.create');
    Route::get('/timetable/{student}', [TimetableController::class, 'getTimetableByStudentId'])->name('student.timetable');
    Route::get('/timetable-class/{class}', [TimetableController::class, 'getTimetableByClassId'])->name('class.timetable');
    Route::middleware('isAdmin')->group(function () {

        Route::get('/timetable', [TimetableController::class, 'index'])->name('timetable.index');
        Route::post('/timetable', [TimetableController::class, 'store'])->name('timetable.store');
        Route::get('/timetable/{timetable}/edit', [TimetableController::class, 'edit'])->name('timetable.edit');
        Route::put('/timetable/{timetable}', [TimetableController::class, 'update'])->name('timetable.update');
        Route::delete('/timetable/{timetable}', [TimetableController::class, 'destroy'])->name('timetable.destroy');
    });
});


require __DIR__ . '/auth.php';
