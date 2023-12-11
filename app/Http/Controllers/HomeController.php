<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('cari');
        $category = $request->get('kategori');

        $posts = Post::filter($search, $category)
            ->orderBy('id', 'DESC')
            ->paginate(4)
            ->withQueryString();
        $categories = Category::all();
        $importantPost = Post::where('penting', 1)->latest('id')->first();
        return view('home', compact('posts', 'categories', 'importantPost'));
    }

    public function showPost($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('post', compact('post', 'categories'));
    }

    public function importantPost()
    {
        $importantPosts = Post::where('penting', 1)->latest('id')->paginate(3);
        $categories = Category::all();
        return view('important-post', compact('importantPosts', 'categories'));
    }
}
