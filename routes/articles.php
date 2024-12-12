<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function(){
        // Récupérer les 3 derniers articles avec leurs catégories associées
        $articles = Article::with('category')->latest()->take(3)->get();

        // Récupérer les 4 dernières catégories
        $categories = Category::latest()->take(4)->get();

        // Retourner les données à la vue
        return Inertia::render('HomePage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'articles' => $articles,
            'categories' => $categories,
        ]);
})->name('welcome');

Route::get('/home', function(){
        // Récupérer les 3 derniers articles avec leurs catégories associées
        $articles = Article::with('category')->latest()->take(3)->get();

        // Récupérer les 4 dernières catégories
        $categories = Category::latest()->take(4)->get();

        // Retourner les données à la vue
        return Inertia::render('HomePage', [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'articles' => $articles,
            'categories' => $categories,
        ]);
})->name('home');

// Liste des articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');


// Formulaire de création d'un article
Route::get('/articles/create', [ArticleController::class, 'create'])->middleware(['auth', 'verified'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->middleware(['auth', 'verified'])->name('articles.store');
// Affichage d'un article
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/recent', [ArticleController::class, 'getRecentArticles'])->name('articles.recent');


Route::post('/articles/{article}/comments/create', [CommentController::class, 'store'])->middleware(['auth', 'verified'])->name('articles.comments.create');
Route::delete('/articles/{article}/comments/{comment}/delete', [CommentController::class, 'destroy'])->middleware(['auth', 'verified'])->name('articles.comments.destroy');
