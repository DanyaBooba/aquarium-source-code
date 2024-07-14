<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;

class AddPostController extends Controller
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

        $findUser = User::where('email', session('email'))->first();

        if ($findUser === null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Пользователь не найден.')
            ]);
        }

        if ($findUser->usertype == -1) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Для публикации постов требуется авторизоваться в аккаунт.')
            ]);
        }

        $idPost = (Post::where('idUser', $findUser->id)->max('idPost') ?? 0) + 1;
        $activePost = in_array($findUser->id, white_id_posts());

        Post::query()->create([
            'idPost' => $idPost,
            'idUser' => $findUser->id,
            'message' => $post,
            'desc' => $shortPost,
            'active' => $activePost
        ]);

        return redirect()->route('user.post.show.id', [$findUser->id, $idPost]);
    }
}
