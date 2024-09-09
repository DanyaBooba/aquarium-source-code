<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Complain;
use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;

class AdminMainController extends Controller
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

    public function complains()
    {
        $complains = Complain::get();

        return view('admin.complains', [
            'complains' => $complains
        ]);
    }

    public function emails()
    {
        return view('admin.emails');
    }
}
