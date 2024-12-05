<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/users', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.users.index');

Route::get('/dashboard/new-user', [UserController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.users.new-user');
