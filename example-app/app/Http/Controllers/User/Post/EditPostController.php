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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'message' => [
                'required', 'string', 'min:1', 'max: 30000'
            ],
            'idPost' => [
                'required', 'integer'
            ]
        ]);

        $user = User::where('email', session('email'))->first();
        $post = Post::where('idUser', $user->id)->where('idPost', $validated['idPost'])->firstOrFail();

        $message = strip_tags($validated['message'], post_free_tags());
        $desc = strip_tags($message);
        $active = in_array($user->id, white_id_posts());

        if ($user->usertype == -1) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Для публикации постов требуется авторизоваться в аккаунт.')
            ]);
        }

        $post->active = $active;
        $post->message = $message;
        $post->desc = $desc;
        $post->save();

        return redirect()->route('post.show', [$user->id, $validated['idPost']]);
    }
}
