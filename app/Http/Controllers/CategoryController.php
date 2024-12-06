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
        $categories = Category::all();
        return Inertia::render('Categories/Index', [
            'categories' => $categories
        ]);
    }

    /**
     * Afficher le formulaire pour créer une catégorie.
     */
    public function create()
    {
        return Inertia::render('Categories/Create');
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

        $category = Category::create($request->only('libelle', 'description'));

        return Inertia::render('Categories/Index', [
            'categories' => Category::all(),
            'category' => $category,  // Inclure la nouvelle catégorie
        ]);
    }

    /**
     * Afficher le formulaire pour modifier une catégorie.
     */
    public function edit(Category $category)
    {
        return Inertia::render('Categories/Edit', [
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
        $category->delete();

        return redirect()->route('categories.index');
    }
}
