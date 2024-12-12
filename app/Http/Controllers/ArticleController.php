<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    // Affichage de la liste des articles
    public function index()
    {
        // Récupérer tous les articles avec leur catégorie associée
        $articles = Article::orderBy('created_at', 'desc')
        ->with('category')
        ->with('comments')
        ->get();

        // Passer les articles et leurs catégories à la vue Inertia
        return Inertia::render('ArticleList', [
            'articles' => $articles,
        ]);
    }
    public function indexAuth()
    {
        // Récupérer les articles de l'utilisateur connecté avec leur catégorie associée
        $user = Auth::user(); // Obtenir l'utilisateur connecté
        $articles = Article::orderBy('created_at', 'desc')
        ->with('category')
        ->with('comments')
        ->where('user_id', $user->id)
        ->get();
        // $articles = Article::with('category')->with('comments')->where('user_id', $user->id)->get();

        // Passer les articles et leurs catégories à la vue Inertia
        return Inertia::render('Dashboard/Articles/Index', [
            'articles' => $articles,
        ]);
    }



    // Affichage du formulaire de création d'article
    public function create()
    {
        // Récupérer toutes les catégories depuis la base de données
        $categories = Category::all();

        // Passer les catégories à la vue Inertia
        return Inertia::render('Dashboard/Articles/Create', [
            'categories' => $categories,
        ]);
    }

    // Enregistrement d'un nouvel article
    public function store(Request $request)
    {
        // Validation des données envoyées
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'tags' => 'required|string',
            'category' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation de l'image
        ]);

        // Gestion de l'upload de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public'); // Stocker l'image dans le dossier public/articles
        }

        // Création de l'article
        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'tags' => $request->tags,
            'image' => $imagePath, // Stockage du chemin de l'image
            'user_id' => Auth::id(),
            'category_id' => $request->category,
        ]);

        // Rediriger après la création avec un message de succès
        return redirect()->route('dashboard.articles.index')->with('success', 'Article créé avec succès');
    }

    // Affichage d'un article spécifique avec sa catégorie et son image
    public function show($id)
    {
        // Récupérer l'article par son ID, avec la catégorie associée
        $article = Article::with('category')->with('user')->with('comments.user')->findOrFail($id);

        // Passer l'article à la vue Inertia
        return Inertia::render('ArticleDetail', [
            'article' => $article,
        ]);
    }

    public function homePage()
    {
        // Récupérer les 3 derniers articles avec leurs catégories associées
        $articles = Article::with('category')->latest()->take(3)->get();

        // Récupérer les 4 dernières catégories
        $categories = Category::latest()->take(4)->get();

        // Retourner les données à la vue
        return Inertia::render('HomePage', [
            'articles' => $articles,
            'categories' => $categories,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
        ]);
    }

    public function destroy(Article $article)
    {
        $article->delete();
        // return to_route('articles');

        return redirect()->route('articles')->with('success', 'Article supprimé');
    }
}
