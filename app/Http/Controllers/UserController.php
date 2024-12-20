<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Validation\Rules;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        // dd($users);
        return Inertia::render('Dashboard/Users/AllUsers', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Dashboard/Users/CreateUser');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'birthdate' => ['nullable', 'date', 'before:today'], // Validation de la date
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'avatar' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'isAdmin' => ['nullable', 'boolean'],
        ]);
        // Initialiser le chemin de l'avatar
        $avatarPath = null;

        // Gérer l'upload de l'image
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'password' => Hash::make($request->password),
            'avatar' => $avatarPath, // Utiliser le chemin de l'avatar
            'isAdmin' => $request->isAdmin
        ]);

        return to_route('dashboard.users.index');
        //  redirect('/dashboard/users')->with('success', 'Utilisateur créé avec succès !');
    }



    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // dd($users);
        return Inertia::render('Dashboard/Users/ShowUser', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return Inertia::render('Dashboard/Users/EditUser', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($request);
        // Étape 1 : Valider les données de la requête
        $request->validate([
            'isAdmin' => 'required|boolean', // Spécifiez les rôles valides
        ]);

        // Étape 2 : Mettre à jour le rôle de l'utilisateur
        $user->isAdmin = $request->input('isAdmin');

        // Étape 3 : Enregistrer les modifications
        $user->save();

        return to_route('dashboard.users.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // dd('ok');
        $user->delete();
        return to_route('dashboard.users.index');

    }
}
