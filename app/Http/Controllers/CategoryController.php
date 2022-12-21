<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(10);
        return view('backend.pages.category.categories', compact('categories'));
    }

    public function create()
    {
        return view('backend.pages.category.category_new');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories'
        ]);

        Category::create([
           'name' => $validated['name'],
        ]);

        return redirect()->route('categories.index');
    }

    public function edit(Category $category)
    {
        return view('backend.pages.category.category_edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::where('id', $id)->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('categories.index');
    }

    public function delete($id)
    {
       $category = Category::findOrFail($id);

        if($category->article->count() == 0) {
            $category->delete();
        }

        return back();
    }
}
