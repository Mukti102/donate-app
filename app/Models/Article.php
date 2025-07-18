<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryArticle;

class Article extends Model
{
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(CategoryArticle::class, 'category_article_id');
    }
    protected $casts = [
        'tags' => 'array',
    ];
    
    protected static function booted()
{
    static::creating(function ($article) {
        if (empty($article->author)) {
            $article->author = 'Admin'; // atau nama default lainnya
        }
    });
}

}
