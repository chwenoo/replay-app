<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\ArticleRequset;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use App\Models\ArticleImage;
use Illuminate\Support\Facades\File;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('articleImages')->get();
        return view('article.index', compact('articles'));
    }

    public function create()
    {
        return view('article.create');
    }

    public function store(ArticleRequset $request)
    {
        $request->validated();

        $article = Article::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'context' => $request->context,
            'excerpt' => $request->excerpt,
        ]);

        $images = $request->file('images');
        foreach($images as $image) {
            $imgName = uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('article_img', $imgName);

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
        // $article = Article::where('id', $id)->first();
        $article = Article::with('articleImages')->where('id', $id)->first();

        return view('article.edit', compact('article'));
    }

    public function update(UpdateRequest $request, int $id)
    {
        $request->validated();

        $article = Article::where('id', $id)->first();

        $article->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'context' => $request->context,
            'excerpt' => $request->excerpt,
        ]);

        if ($request->images) {

            $request->validate([
                "images" => ['array'],
                "images.*" => ['image', 'mimes:png,jpg,jpeg'],
            ]);

            // Delete Old images in File
            $oldImages = ArticleImage::where('article_id', $id)->get();
            foreach($oldImages as $image) {
                if(File::exists(public_path('article_img/'.$image->name))) {
                    File::delete(public_path('article_img/'.$image->name));
                }
                // delete db file
                $image->delete();
            }

            $images = $request->file('images');
            foreach($images as $image) {
                $imgName = uniqid().'.'.$image->getClientOriginalExtension();
                $image->move('article_img', $imgName);

                ArticleImage::create([
                    'name' => $imgName,
                    'article_id' => $article->id,
                ]);
            }
        }

        return redirect()->route('articles.index');
    }

    public function destroy(int $id)
    {
        Article::find($id)->delete();
        return redirect()->route('articles.index');
    }
}
