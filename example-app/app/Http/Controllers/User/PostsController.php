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
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:254', 'min: 3', 'email'],
            'password' => ['required', 'string', 'min:3', 'max:254'],
        ]);

        dd('post');
    }
}
