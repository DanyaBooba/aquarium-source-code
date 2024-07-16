<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    public function post_set_status_active($idpost)
    {
        $post = Post::where('id', $idpost)->first();

        $post->active = 1;
        $post->save();

        return redirect()->back();
    }

    public function post_set_status_unactive($idpost)
    {
        $post = Post::where('id', $idpost)->first();

        $post->active = 0;
        $post->save();

        return redirect()->back();
    }

    public function post_set_status_block($idpost)
    {
        $post = Post::where('id', $idpost)->first();

        $post->active = -1;
        $post->save();

        return redirect()->back();
    }
}
