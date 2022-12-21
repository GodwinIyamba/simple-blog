<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::with('category', 'tags')->latest()->limit(5)->get();
        $categories = Category::latest()->limit(5)->get();
        $tags = Tag::latest()->limit(5)->get();

        return view('backend.pages.dashboard', compact('articles','categories', 'tags'));
    }
}
