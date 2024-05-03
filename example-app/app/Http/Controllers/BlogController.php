<?php

namespace App\Http\Controllers;

use App\Models\Posts\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::orderByDesc('created_at')->where('active', 1)->get();

        return view('blog.index', [
            'blog' => $blog
        ]);
    }

    public function show()
    {
        return view('blog.show');
    }
}
