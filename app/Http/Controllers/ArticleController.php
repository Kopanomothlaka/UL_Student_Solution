<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller


{


    public function store(Request $request)

    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $article = new Article();
        $article->title = $request->title;
        $article->content = $request->content;

        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('articles', 'public');
        }

        $article->status = 'published'; // Set to 'draft' or 'published' based on your needs
        $article->save();

        return redirect()->back()->with('success', 'Article added successfully!');
    }
}
