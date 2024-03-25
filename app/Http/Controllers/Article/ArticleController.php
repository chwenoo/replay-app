<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequset;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use App\Models\ArticleImage;

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
        // $request->validated();

        $article = Article::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'context' => $request->context,
            'excerpt' => $request->excerpt,
        ]);

        $images = $request->file('images');
        foreach($images as $image) {
            $imgName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('article_img', $imgName));

            ArticleImage::create([
                'name' => $imgName,
                'article_id' =>$article->id,
            ]);
        }

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
