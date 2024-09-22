<?php

use App\Http\Controllers\ClassController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/{id}', [StudentController::class, 'profile'])->name('student.profile');
    Route::get('/your-parents/{student}', [StudentController::class, 'getParentsByStudentId'])->name('student.parent');
    Route::post('/storeStudentclass/{id}', [StudentController::class, 'setClass'])->name('student.class');
    Route::get('/class/{class}', [ClassController::class, 'show'])->name('class.show');
});



require __DIR__ . '/auth.php';
