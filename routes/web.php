<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/dashboard');
});

// Guest Routes
require __DIR__ . '/auth.php';


// Student Routes
require __DIR__ . '/student.php';


// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile Routes
    require __DIR__ . '/profile.php';

    // Admin Routes
    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        require __DIR__ . '/admin/courses.php';
        require __DIR__ . '/admin/chapters.php';
        require __DIR__ . '/admin/sections.php';
    });
});
