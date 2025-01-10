<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;

// Student Course Routes
Route::prefix('courses')->name('courses.')->group(function () {
    Route::get('/{course}/enroll', [CourseController::class, 'enroll'])->name('enroll');
    Route::get('/show/{course}', [CourseController::class, 'show'])->name('show');
    Route::get('/{course:slug}', [CourseController::class, 'chapters'])->name('chapters');
});

Route::prefix('chapters')->name('chapters.')->group(function () {
    Route::get('/{chapter:slug}', [ChapterController::class, 'chapter'])->name('show');
});

Route::prefix('sections')->name('sections.')->group(function () {
    Route::get('/{section:slug}', [SectionController::class, 'section'])->name('show');
});
