<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ChapterController;

Route::get('/', function () {
    return redirect('/dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/courses/{course}/enroll', [CourseController::class, 'enroll'])->name('course.enroll');
    Route::get('/show-courses/{course}', [CourseController::class, 'show'])->name('course.show');

    Route::get('/courses/{course}', [CourseController::class, 'chapters'])->name('course.chapters');
    Route::get('/chapter/{chapter}', [ChapterController::class, 'chapter'])->name('chapter.student.show');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/setup-courses', [CourseController::class, 'setup'])->name('course.setup');
    Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('course.edit');
    Route::get('/add-course', [CourseController::class, 'create'])->name('course.create');
    Route::put('/update-course/{course}', [CourseController::class, 'update'])->name('course.update');

    Route::get('/setup-chapters', [ChapterController::class, 'setup'])->name('chapter.setup');
    Route::get('/edit-chapter/{chapter}', [ChapterController::class, 'edit'])->name('chapter.edit');
    Route::get('/add-chapter', [ChapterController::class, 'create'])->name('chapter.create');
});
Route::post('/store-course', [CourseController::class, 'store'])->name('course.store');

require __DIR__.'/auth.php';
