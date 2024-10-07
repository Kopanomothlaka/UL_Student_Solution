<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Fetch the latest 3 articles
        $articles = Article::latest()->take(3)->get();

        return view('student.dashboard', compact('articles')); // Pass articles to the view
    }

    public function updates()
    {
        $articles = Article::latest()->get(); // Fetch latest 6 articles
        return view('student.updates', compact('articles')); // Pass articles to the view
    }
}
