<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/home', [ArticleController::class, 'homePage'])->name('home');

// Liste des articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');


// Formulaire de création d'un article
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
// Affichage d'un article
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/recent', [ArticleController::class, 'getRecentArticles'])->name('articles.recent');


Route::post('/articles/comments/create', [CommentController::class, 'store'])->name('articles.comments.create');
