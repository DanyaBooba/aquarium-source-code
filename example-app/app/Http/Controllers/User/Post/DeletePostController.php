<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;

class DeletePostController extends Controller
{
    public function delete($idPost)
    {
        $userid = user_profile()->id;
        $post = Post::where('idPost', $idPost)->where('idUser', $userid)->firstOrFail();

        $post->delete();

        return redirect()->route('user');
    }
}
