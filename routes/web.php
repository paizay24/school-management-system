<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\DashboardController;

Route::get('/',[PageController::class,'index'])->name('page.index');
Route::get('/detail/{slug}',[PageController::class,'detail'])->name('page.detail');


Auth::routes();

// routes/web.php
Route::get('/dashboard/counts', [DashboardController::class, 'getCounts'])->name('dashboard.counts');


// Admin routes with full CRUD access
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

    Route::resource('/teacher', TeacherController::class);
    Route::resource('/classroom', ClassroomController::class);
    Route::resource('/student', StudentController::class);
    Route::resource('/post',PostController::class);
    Route::resource('/photos',PhotoController::class);
});

// // Teacher routes with only index access
// Route::middleware(['auth', 'teacher'])->group(function () {
//     Route::get('/dashboard', [HomeController::class, 'index'])->name('home');

//     Route::get('student', [StudentController::class, 'index'])->name('student.index');
//     Route::get('teacher', [TeacherController::class, 'index'])->name('teacher.index');
//     Route::get('classroom', [ClassroomController::class, 'index'])->name('classroom.index');
// });
