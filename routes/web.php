<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();



// Admin routes with full CRUD access
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::resource('/teacher', TeacherController::class);
    Route::resource('/classroom', ClassroomController::class);
    Route::resource('/student', StudentController::class);
    Route::resource('/post',PostController::class);
});

// // Teacher routes with only index access
// Route::middleware(['auth', 'teacher'])->group(function () {
//     Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

//     Route::get('student', [StudentController::class, 'index'])->name('student.index');
//     Route::get('teacher', [TeacherController::class, 'index'])->name('teacher.index');
//     Route::get('classroom', [ClassroomController::class, 'index'])->name('classroom.index');
// });
