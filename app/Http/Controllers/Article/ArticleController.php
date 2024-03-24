<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequset;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(ArticleRequset $request)
    {
        Article::create($request->validated());

        return redirect()->route('articles.index');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(int $id)
    {
        // $article = Article::find($id);
        $article = Article::where('id', $id)->first();

        return view('article.edit', compact('article'));
    }

    public function update(UpdateRequest $request, int $id)
    {
        $article = Article::where('id', $id)->first();

        $article->update($request->validated());

        return redirect()->route('articles.index');
    }

    public function destroy(int $id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect()->route('articles.index');
    }
}
