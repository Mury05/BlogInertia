<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ArticleController extends Controller
{
    // Affichage de la liste des articles
    public function index()
    {
        // Récupérer tous les articles avec leur catégorie associée
        $articles = Article::with('category')->orderBy('created_at', 'DESC')->get();

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
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'tags' => 'required|string',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validation de l'image
        ]);

        // Gestion de l'upload de l'image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public');
        }

        // Création de l'article
        Article::create([
            'title' => $request->title,
            'body' => $request->body,
            'tags' => $request->tags,
            'image' => $imagePath,
            'user_id' => auth()->id(),
            'category_id' => $request->category,
        ]);

        // Rediriger après la création avec un message de succès
        return redirect()->route('articles')->with('success', 'Article créé avec succès');
    }



    // Affichage d'un article spécifique
    public function show($id)
    {
        // Récupérer l'article avec la catégorie associée
        $article = Article::with('category', 'user')->findOrFail($id);

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

    // Affichage du formulaire d'édition d'un article
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();

        return Inertia::render('Edit', [
            'article' => $article,
            'categories' => $categories,
        ]);
    }


    // Mise à jour de l'article
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'tags' => 'required|string',
            'category' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Récupérer l'article à modifier
        $article = Article::findOrFail($id);

        // Mise à jour de l'image si présente
        $imagePath = $article->image;
        if ($request->hasFile('image')) {

            $imagePath = $request->file('image')->store('articles', 'public');
        }

        // Mise à jour de l'article
        $article->update([
            'title' => $request->title,
            'body' => $request->body,
            'tags' => $request->tags,
            'category_id' => $request->category,
            'image' => $imagePath,
        ]);

        // Redirection avec succès
        return redirect()->route('articles.show', $article->id)->with('success', 'Article mis à jour avec succès');
    }
    public function destroy(Article $article)
{
    // Vérification si l'utilisateur est le propriétaire de l'article
    if ($article->user_id !== auth()->id()) {
        return redirect()->route('articles')->with('error', 'Vous n\'êtes pas autorisé à supprimer cet article.');
    }

    // Suppression de l'article
    $article->delete();

    return redirect()->route('articles')->with('success', 'Article supprimé avec succès.');
}



}
