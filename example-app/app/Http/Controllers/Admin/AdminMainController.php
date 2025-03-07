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
        $usersVerified = User::where('verified', true)->get();

        return view('admin.index', [
            'users' => $users,
            'usersVerified' => $usersVerified
        ]);
    }

    public function posts()
    {
        $posts = Post::get();
        $postsNotPublished = Post::where('active', '<>', '1')->get();
        $postsPublished = Post::where('active', '1')->get();

        return view('admin.posts', [
            'posts' => $posts,
            'postsNotPublished' => $postsNotPublished,
            'postsPublished' => $postsPublished,
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
