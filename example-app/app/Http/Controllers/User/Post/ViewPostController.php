<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;

class ViewPostController extends Controller
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
        $itsmypost = false;
        $comments = [];

        if ($post->active == false && $findUserSession == null) {
            abort(403);
        }

        if ($post->active == false && $findUserSession->id != $post->idUser && $findUserSession->usertype !== 100) {
            abort(403);
        }

        if ($findUserSession) {
            $itsmypost = $findUserSession->id == $post->idUser;
        }

        return view('user.show-post', [
            'active' => $post->active,
            'user' => $user,
            'post' => $post,
            'itsmypost' => $itsmypost,
            'comments' => $comments,
        ]);
    }
}
