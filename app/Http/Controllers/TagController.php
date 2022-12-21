<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::latest()->paginate(10);
        return view('backend.pages.tag.tags', compact('tags'));
    }


    public function create()
    {
        return view('backend.pages.tag.tag_new');
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tags'
        ]);

        Tag::create([
            'name' => $validated['name'],
        ]);

        return redirect()->route('tags.index');
    }

    public function edit(Tag $tag)
    {
        return view('backend.pages.tag.tag_edit', compact('tag'));
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|unique:tags'
        ], [
            'name.unique' => 'The tag already exists.'
        ]);

        Tag::where('id', $id)->update([
            'name' => $validated['name'],
        ]);

        return redirect()->route('tags.index');
    }


    public function delete($id)
    {
        $tags = Tag::where('id', $id)->get();

        foreach ($tags as $tag){
            $tag->articles()->detach();
        }

        Tag::findOrFail($id)->delete();

        return back();
    }
}
