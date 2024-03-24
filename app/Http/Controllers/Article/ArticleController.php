<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('article.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => ['required', 'string'],
            "slug" => [
                'required', 'string',
                'unique:articles',
                // Rule::unique('articles')->ignore($this->route('article'))
            ],
            "context" => ['required', 'string'],
            "excerpt" => ['required', 'string'],
        ]);

        $articles = Article::create([
            "title" => $request->title,
            "slug" => $request->slug,
            "context" => $request->context,
            "excerpt" => $request->excerpt,
        ]);

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        // $article = Article::find($id);
        $article = Article::where('id', $id)->first();

        return view('article.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            "title" => ['required', 'string'],
            "slug" => [
                'required', 'string',
                // 'unique:articles',
                Rule::unique('articles')->ignore($id)
            ],
            "context" => ['required', 'string'],
            "excerpt" => ['required', 'string'],
        ]);
        // $article = Article::find($id);
        $article = Article::where('id', $id)->first();

        $article->update([
            "title" => $request->title,
            "slug" => $request->slug,
            "context" => $request->context,
            "excerpt" => $request->excerpt,
        ]);
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('articles.index');
    }
}
