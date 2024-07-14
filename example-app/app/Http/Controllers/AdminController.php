<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use App\Models\User\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('admin.index', [
            'users' => $users
        ]);
    }

    public function posts()
    {
        $posts = Post::get();

        return view('admin.posts', [
            'posts' => $posts
        ]);
    }
}
