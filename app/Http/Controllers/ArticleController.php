<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArticleController extends Controller
{
    // Affichage de la liste des articles
    public function index()
    {
        // Récupérer tous les articles avec leur catégorie associée
        $articles = Article::with('category')->get();

        // Passer les articles et leurs catégories à la vue Inertia
        return Inertia::render('ArticleList', [
            'articles' => $articles,
        ]);
    }

    // Affichage du formulaire de création d'article
    public function create()
    {
        // Récupérer toutes les catégories depuis la base de données
        $categories = Category::all();

        // Passer les catégories à la vue Inertia
        return Inertia::render('Create', [
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
            'category' => 'required|exists:categories,id',
        ]);

        // Création de l'article
        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->id(), // Assurez-vous que l'utilisateur est authentifié
            'category_id' => $request->category,
        ]);

        // Rediriger après la création avec un message de succès
        return redirect()->route('articles.create')->with('success', 'Article créé avec succès');
    }

    // Ajoutez la méthode show dans le contrôleur ArticleController
    public function show($id)
    {
        // Récupérer l'article par son ID, avec la catégorie associée
        $article = Article::with('category')->findOrFail($id);

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
    ]);
}

}
