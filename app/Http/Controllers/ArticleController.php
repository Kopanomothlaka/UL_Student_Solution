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

    public function show($id)
    {
        // Fetch the article by ID
        $article = Article::findOrFail($id); // This will throw a 404 if not found
        return view('articles.show_article', compact('article')); // Pass the article to the view
    }
    public function news()
    {
        $articles = Article::orderBy('created_at', 'desc')->get(); // Fetch all articles ordered by creation date
        return view('admin.news', compact('articles')); // Pass articles to the view
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();

        return redirect()->back()->with('success', 'Article deleted successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);

        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->content = $request->content;

        if ($request->hasFile('image')) {
            $article->image = $request->file('image')->store('articles', 'public');
        }

        $article->save();

        return redirect()->back()->with('success', 'Article updated successfully!');
    }










}
