<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/dashboard', [ArticleController::class, 'indexAuth'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard/users', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.users.index');

Route::get('/dashboard/new-user', [UserController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.users.new-user');

Route::get('/dashboard/users/{user}', [UserController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.users.show');

Route::get('/dashboard/users/{user}/edit', [UserController::class, 'edit'])->middleware(['auth', 'verified'])->name('dashboard.users.edit');

Route::put('/dashboard/users/{user}/edit', [UserController::class, 'update'])->middleware(['auth', 'verified'])->name('dashboard.users.update');

Route::delete('/dashboard/users/{user}', [UserController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.users.destroy');

Route::get('/dashboard/articles', [ArticleController::class, 'indexAuth'])->middleware(['auth', 'verified'])->name('dashboard.articles.index');

Route::get('/dashboard/articles/create', [ArticleController::class, 'create'])->middleware(['auth', 'verified'])->name('dashboard.articles.create');

Route::delete('/dashboard/articles/{article}/destroy', [ArticleController::class, 'destroy'])->middleware(['auth', 'verified'])->name('dashboard.articles.destroy');

Route::resource('/dashboard/categories', CategoryController::class)->middleware(['auth', 'verified']);
