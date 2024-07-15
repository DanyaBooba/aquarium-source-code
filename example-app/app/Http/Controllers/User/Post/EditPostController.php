<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;

class EditPostController extends Controller
{
    public function index($idPost)
    {
        $userId = User::where('email', session('email'))->first()->id;
        $post = Post::where('idUser', $userId)->where('idPost', $idPost)->firstOrFail();

        return view('user.editpost', [
            'post' => $post,
            'userId' => $userId
        ]);
    }
}
