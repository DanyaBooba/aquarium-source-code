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
        $iduser = user_profile()->id;
        $whiteList = in_array($iduser, white_id_posts());

        return view('user.addpost', [
            'whiteList' => $whiteList
        ]);
    }

    public function post(Request $request)
    {
        $validated = $request->validate(['message' => ['required', 'string', 'min:1', 'max: 30000']]);

        $post = strip_tags($validated['message'], post_free_tags());
        $shortPost = $this->privateCreateDescription($post);

        $findUser = user_profile();

        if ($findUser === null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Пользователь не найден.')
            ]);
        }

        if ($findUser->usertype == -1) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Для публикации записей требуется авторизоваться в аккаунт.')
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

        return redirect()->route('post.show', [$findUser->id, $idPost]);
    }

    private function privateCreateDescription($post)
    {
        // Заменяем <br> на пробелы
        $postContent = str_replace(['<br>', '<br/>', '<br />'], ' ', $post);

        // Добавляем пробелы между тегами
        $postContent = preg_replace('/(<\/[^>]+>)(<[^>\/][^>]*>)/', '$1 $2', $postContent);

        // Удаляем все HTML-теги
        $postContent = strip_tags($postContent);

        // Удаляем лишние пробелы
        $postContent = preg_replace('/\s+/', ' ', $postContent);
        $postContent = trim($postContent);

        // Обрезаем текст до 255 символов, не обрезая последнее слово
        if (mb_strlen($postContent) > 255) {
            $postContent = mb_substr($postContent, 0, 255);
            $postContent = mb_substr($postContent, 0, mb_strrpos($postContent, ' '));
        }

        return $postContent;
    }
}
