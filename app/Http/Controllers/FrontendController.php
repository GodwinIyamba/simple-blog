<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function HomeView()
    {
        $articles = Article::latest()->get();
        return view('frontend.pages.home', compact('articles'));
    }

    public function AboutView()
    {
        return view('frontend.pages.about');
    }

    public function ArticleView($id)
    {
        $article = Article::findOrFail($id);
        return view('frontend.pages.article_view', compact('article'));
    }
}
