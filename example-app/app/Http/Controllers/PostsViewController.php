<?php

namespace App\Http\Controllers;

use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;

class PostsViewController extends Controller
{
    public function id($id, $idPost)
    {
        $user = User::where('id', $id)->where('verified', true)->firstOrFail();

        return $this->show($user, $idPost);
    }

    public function nickname($nickname, $idPost)
    {
        $user = User::where('username', $nickname)->where('verified', true)->firstOrFail();
        
        return $this->show($user, $idPost);
    }

    private function show(User $user, $idPost)
    {
        $findUserSession = User::where('email', session('email'))->first();
        $post = Post::where('idPost', $idPost)->where('idUser', $user->id)->firstOrFail();
        $comments = [];

        if ($post->active == false && $findUserSession == null) {
            return view('errors.418');
        }

        if ($post->active == false && $findUserSession->id != $post->idUser && $findUserSession->usertype !== 100) {
            return view('errors.418');
        }

        return view('user.show-post', [
            'active' => $post->active,
            'user' => $user,
            'post' => $post,
            'itsmypost' => $findUserSession->id != $post->idUser,
            'comments' => $comments,
        ]);
    }
}
