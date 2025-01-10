<?php

use App\Http\Controllers\SectionController;
use Illuminate\Support\Facades\Route;

Route::prefix('sections')->name('sections.')->group(function () {
    Route::get('/setup', [SectionController::class, 'setup'])->name('setup');
    Route::get('/create', [SectionController::class, 'create'])->name('create');
    Route::post('/', [SectionController::class, 'store'])->name('store');
    Route::get('/{section}/edit', [SectionController::class, 'edit'])->name('edit');
    Route::put('/{section}', [SectionController::class, 'update'])->name('update');
    Route::delete('/{section}', [SectionController::class, 'destroy'])->name('destroy');
    Route::patch('/{section}/activate', [SectionController::class, 'activate'])->name('activate');
    Route::patch('/{section}/deactivate', [SectionController::class, 'deactivate'])->name('deactivate');
});
