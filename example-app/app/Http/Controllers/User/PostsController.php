<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index()
    {
        return view('user.addpost');
    }

    public function post(Request $request)
    {
        $validated = $request->validate(['message' => ['required', 'string', 'min:1', 'max: 30000']]);

        $post = $validated['message'];
        $shortPost = strip_tags($post);

        dd('ready to load');
    }
}
