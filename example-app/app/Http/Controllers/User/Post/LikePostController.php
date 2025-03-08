<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;

class LikePostController extends Controller
{
    public function like($id, $idPost)
    {
        $user = user_profile();
        if (!$user) return redirect()->route('auth.signin');

        if ($user->usertype === -1) return redirect()->back();

        $userPost = User::where('verified', 1)->where('id', $id)->firstOrFail();
        $post = Post::where('active', 1)->where('idPost', $idPost)->where('idUser', $id)->firstOrFail();

        $countLikes = $post->likes;
        $countLikesPosts = $user->likesPosts;

        $usersLikes = (array) json_decode($post->usersLikes);
        $postsLikes = (array) json_decode($user->likesPostsJson);
        $isLike = in_array($user->id, $usersLikes);

        if ($isLike) {
            array_splice($usersLikes, array_search(intval($user->id), $usersLikes), 1);
            array_splice($postsLikes, array_search(intval($post->id), $postsLikes), 1);

            $countLikes = math_min_zero($countLikes - 1);
            $countLikesPosts = math_min_zero($countLikesPosts - 1);
        } else {
            array_push($usersLikes, intval($user->id));
            array_push($postsLikes, intval($post->id));

            $countLikes += 1;
            $countLikesPosts += 1;
        }

        $post->usersLikes = $usersLikes;
        $post->likes = $countLikes;
        $post->save();

        $user->likesPosts = $countLikesPosts;
        $user->likesPostsJson = $postsLikes;
        $user->save();

        return redirect()->route('post.show', [$id, $idPost]);
    }
}
