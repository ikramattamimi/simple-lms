<?php

use App\Http\Controllers\ChapterController;
use Illuminate\Support\Facades\Route;

Route::prefix('chapters')->name('chapters.')->group(function () {
    Route::get('/setup', [ChapterController::class, 'setup'])->name('setup');
    Route::get('/create', [ChapterController::class, 'create'])->name('create');
    Route::get('/{chapter}/edit', [ChapterController::class, 'edit'])->name('edit');
    Route::put('/{chapter}', [ChapterController::class, 'update'])->name('update');
    Route::patch('/{chapter}/activate', [ChapterController::class, 'activate'])->name('activate');
    Route::patch('/{chapter}/deactivate', [ChapterController::class, 'deactivate'])->name('deactivate');
});
