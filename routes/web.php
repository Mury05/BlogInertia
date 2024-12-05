<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard/{any?}', function () {
    return Inertia::render('Dashboard');
})->where('any', '.*')->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/home', function () {
    return Inertia::render('HomePage');
})->name('home');;

Route::get('/articles', action: function () {
    return Inertia::render('ArticleList');
})->name('articles');;

Route::get('/edit', function () {
    return Inertia::render('Edit');
})->name('edit');;

Route::get('/articleE', action: function () {
    return Inertia::render('ArticleEditer');
})->name('articleE');;

Route::get('/article', action: function () {
    return Inertia::render('ArticleDetail');
})->name('article');;

Route::get('/create', action: function () {
    return Inertia::render('Create');
})->name('create');;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';
