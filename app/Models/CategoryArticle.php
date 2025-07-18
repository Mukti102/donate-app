<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
class CategoryArticle extends Model
{
    protected $guarded = ['id'];

    public function articles(){
        return $this->belongsTo(Article::class);
    }
}
