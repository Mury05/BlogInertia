<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    /**
     * Afficher la liste des catégories.
     */
    public function index()
    {
        // Tri des catégories par created_at en ordre décroissant
        $categories = Category::orderBy('created_at', 'desc')->get();

        return Inertia::render('Dashboard/Categories/Index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Afficher le formulaire pour créer une catégorie.
     */
    public function create()
    {
        return Inertia::render('Dashboard/Categories/Create');
    }

    /**
     * Enregistrer une nouvelle catégorie.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        // Création de la nouvelle catégorie
        $category = Category::create($request->only('libelle', 'description'));

        // Récupérer toutes les catégories triées par created_at en ordre décroissant
        $categories = Category::orderBy('created_at', 'desc')->get();

        // Retourner la liste complète des catégories
        return Inertia::render('Dashboard/Categories/Index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Afficher le formulaire pour modifier une catégorie.
     */
    public function edit(Category $category)
    {
        return Inertia::render('Dashboard/Categories/Edit', [
            'category' => $category
        ]);
    }

    /**
     * Mettre à jour une catégorie.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
        ]);

        $category->update($request->only('libelle', 'description'));

        return redirect()->route('categories.index');
    }

    /**
     * Supprimer une catégorie.
     */
    public function destroy(Category $category)
    {
        // Supprimer la catégorie
        $category->delete();

        // Récupérer les catégories restantes et renvoyer la mise à jour
        $categories = Category::orderBy('created_at', 'desc')->get();

        // Retourner les catégories mises à jour avec Inertia
        return Inertia::render('Dashboard/Categories/Index', [
            'categories' => $categories,
        ]);
    }

}
