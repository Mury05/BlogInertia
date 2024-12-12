<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Article $article)
    {
        $request['article_id']= $article->id;

        // dd($request);
        // Validation des données envoyées
        $request->validate([
            'comment' => 'required|string|max:255',
            'article_id' => 'required|exists:articles,id',
        ]);
        Comment::create([
            'comment' => $request->comment,
            'article_id' => $request->article_id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('articles.show', $request->article_id)->with('success', 'Nouveau commentaire');

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Article $article,Comment $comment)
    {
        // dd('ok');        
        $comment->delete();
        return redirect()->route('articles.show', $article->id)->with('success', 'Commentaire supprimé');

    }
}
