<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
     public function index(Request $request)
    {
        $categoryId = $request->input('category_id');
        $time = $request->input('time'); // 'terbaru' atau 'terlama'
        $categories = CategoryArticle::all();

        $query = Article::query();

        if ($categoryId) {
            $query->where('category_article_id', $categoryId);
        }

        if ($time === 'terbaru') {
            $query->orderBy('created_at', 'desc');
        } elseif ($time === 'terlama') {
            $query->orderBy('created_at', 'asc');
        }

        $articles = $query->get();

        return view('pages.articles.index', compact('articles', 'categories'));
    }

    public function show($id){
        $article = Article::with('category')->find(decrypt($id));
        $related = Article::where('category_article_id',$article->category_article_id)->limit(5)->get();
        return view('pages.articles.show',compact('article','related'));
    }
}
