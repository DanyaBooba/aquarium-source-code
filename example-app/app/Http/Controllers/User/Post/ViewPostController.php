<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\User\Comment;
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
        $findUserSession = user_profile();
        $post = Post::where('idPost', $idPost)->where('idUser', $user->id)->firstOrFail();
        $comments = Comment::where('idPost', $post->id)->where('active', 1)->orderBy('updated_at', 'desc')->get();

        foreach ($comments as $comment) {
            $findUser = User::where('id', $comment->idUser)->first();
            $findUser->userName = profile_display_name($findUser->firstName, $findUser->lastName);;
            $comment->findUser = $findUser;
        }

        $itsmypost = false;
        $like = false;
        $views = $post->views;

        if (session()->has('numberOfPostSee-' . $post->id) == false) {
            $views += 1;
            $post->views = $views;
            $post->save();
        }

        session([
            'numberOfPostSee-' . $post->id => 'true',
        ]);

        if ($post->active != 1 && $findUserSession == null) {
            return view('errors.418');
        }

        if ($post->active != 1 && $findUserSession->id != $post->idUser && $findUserSession->usertype !== 100) {
            return view('errors.418');
        }

        if ($findUserSession) {
            $itsmypost = $findUserSession->id == $post->idUser;

            $allIdsLikeThisPost = json_decode($post->usersLikes) ?? [];
            $like = in_array($findUserSession->id, $allIdsLikeThisPost);
        }

        return view('user.show-post', [
            'active' => $post->active,
            'user' => $user,
            'post' => $post,
            'itsmypost' => $itsmypost,
            'comments' => $comments,
            'like' => $like,
            'countLikes' => $post->likes,
            'views' => $views,
        ]);
    }
}
