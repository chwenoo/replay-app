<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'context',
        'excerpt',
    ];

    public function articleImages() {
        return $this->hasMany(ArticleImage::class);
    }
}
