<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ensure you have necessary imports

class SecurityAdminController extends Controller
{


    public function index()
    {
        $articles = Article::latest()->take(5)->get(); // Fetch the latest 5 articles
        return view('admin.security_dashboard', compact('articles')); // Pass articles to the view
    }


    // Logout the admin user
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Log the admin out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('login'); // Redirect to the admin login page
    }

}
