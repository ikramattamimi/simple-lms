<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;

Route::get('/', function () {
    return redirect('/dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('course.enroll');
    Route::get('/courses/{course}', [CourseController::class, 'show'])->name('course.show');

    Route::get('/courses/{course}/sections', [CourseController::class, 'sections'])->name('course.sections');
});

require __DIR__.'/auth.php';
