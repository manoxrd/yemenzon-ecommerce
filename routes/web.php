<?php

use App\Http\Controllers\ProductController;
use App\Http\Middleware\UserHasRole;
use Illuminate\Support\Facades\Route;

Route::inertia('/', 'Welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    // Route::inertia('dashboard', 'Dashboard')->name('dashboard');
    Route::get('dashboard', [ProductController::class, 'index'])->name('dashboard');
});

// Route::middleware(['auth', UserHasRole::class.':admin,employee'])->group(function () {
//     Route::inertia('dashboard', 'Dashboard')->name('dashboard');
// });

require __DIR__.'/settings.php';