<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
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

// Route pour l'édition d'un article
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
// Route pour supprimer un article
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

// Route pour mettre à jour un article
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');


Route::get('/home', [ArticleController::class, 'homePage'])->name('home');

// Liste des articles
Route::get('/article', [ArticleController::class, 'index'])->name('articles'); // Liste des articles
// Formulaire de création d'un article
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create'); // Création d'un article
Route::post('/article', [ArticleController::class, 'store'])->name('articles.store'); // Enregistrement d'un <article></article>
// Affichage d'un article
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show'); // Affichage d'un article spécifiqueRoute::get('/articles/recent', [ArticleController::class, 'getRecentArticles'])->name('articles.recent');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.update.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';