<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::with('category', 'tags')->latest()->paginate(10);
        return view('backend.pages.article.articles', compact('articles'));
    }


    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('backend.pages.article.article_new', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|unique:articles|string',
            'body' => 'required|string',
            'category' => 'required',
            'tags' => 'nullable|string',
            'article_cover' =>  'nullable|max:3000'
        ]);


        if($request->hasFile('article_cover')) {
            $cover_extension = $request->file('article_cover')->getClientOriginalExtension();
            $file_path = 'upload/article/' . hexdec(uniqid()) . '.' . $cover_extension;
            Image::make($request->file('article_cover'))->resize(400, 219)->save($file_path);
        }

        $article_id = Article::insertGetId([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            'user_id' => Auth::id(),
            'article_cover' => $file_path ?? 'upload/article/default.jpg',
            'created_at' => Carbon::now(),
        ]);

        $tags = explode(',', $request->tags);

        foreach ($tags as $tag) {
            $newTag = Tag::firstOrCreate([
                'name' => $tag,
            ]);
            Article::findOrFail($article_id)->tags()->attach($newTag);
        }

        return redirect()->route('articles.index');

    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $tags = Article::findOrFail($id)->tags;
        $tagsArray = [];
        foreach ($tags as $tag){
            array_push($tagsArray, $tag->name);
        }
        $tagsOld = implode(',', $tagsArray);
        $categories = Category::all();

        return view('backend.pages.article.article_edit', compact('categories', 'tagsOld', 'article'));
    }

    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'title' => 'required|string',
            'body' => 'required',
            'category' => 'required',
            'tags' => 'nullable|string',
            'article_cover' =>  'nullable|max:3000'
        ]);

        $article = Article::findOrFail($id);

        if($request->hasFile('article_cover')) {
            if($article->article_cover != 'upload/article/default.jpg') {
                unlink($article->article_cover);
            }

            $cover_extension = $request->file('article_cover')->getClientOriginalExtension();
            $file_path = 'upload/article/' . hexdec(uniqid()) . '.' . $cover_extension;
            Image::make($request->file('article_cover'))->resize(400, 219)->save($file_path);
        }

        $article->update([
            'title' => $request->title,
            'body' => $request->body,
            'category_id' => $request->category,
            'user_id' => Auth::id(),
            'article_cover' => $file_path ?? 'upload/article/default.jpg',
            'updated_at' => Carbon::now(),
        ]);

        $tags = explode(',', $request->tags);
        $newTags = [];

        foreach ($tags as $tag) {
            $newTag = Tag::firstOrCreate([
                'name' => $tag,
            ]);
            array_push($newTags, $newTag->id);
        }

        $article->tags()->sync($newTags);

        return redirect()->route('articles.index');
    }

    public function delete($id)
    {
        $article = Article::with( 'tags')->where('id', $id)->get();

        foreach ($article as $item) {
            $item->tags()->detach();
        }

        Article::where('id', $id)->delete();

        return back();
    }
}
