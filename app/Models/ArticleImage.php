<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'article_id',
    ];

    public function image()
    {
        return $this->belongsTo(Article::class);
    }
}
