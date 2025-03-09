<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use App\Models\User\Comment;
use App\Models\User\Post;
use Illuminate\Http\Request;

class AddCommentController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'message' => [
                'required',
                'string',
                'min:1',
                'max: 30000'
            ],
            'id' => [
                'required',
                'integer',
            ]
        ]);

        $message = trim($request['message']);
        $id = $request['id'];

        $findPostWithId = Post::where('id', $id)->firstOrFail();
        $findUserSession = user_profile();

        if ($findUserSession === null) {
            return redirect()->back();
        }

        if ($findPostWithId->active != 1) {
            return redirect()->back()->withErrors([
                'error' => 'Чтобы написать комментарий, запись должна быть одобрена к публикации.'
            ]);
        }

        $idMessage = (Comment::where('idMessage', $findUserSession->id)->max('idMessage') ?? 0) + 1;

        Comment::query()->create([
            'active' => true,
            'idPost' => $id,
            'message' => $message,
            'idUser' => $findUserSession->id,
            'idMessage' => $idMessage,
        ]);

        return redirect()->back();
    }
}
