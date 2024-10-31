<?php

namespace App\Http\Controllers\Api\User\Posts;

use App\Http\Controllers\Controller;
use App\Models\User\Post;
use Illuminate\Http\Request;

class ApiPostsController extends Controller
{
    public function all()
    {
        $posts = Post::select($this->selectFields())->where('active', true)->get();
        return $posts;
    }

    public function post($id, $idPost)
    {
        $post = Post::select($this->selectFields())->where('idPost', $idPost)->where('idUser', $id)->where('active', true)->first();
        if ($post == null) return "{}";
        return $post;
    }

    public function userposts($id)
    {
        $posts = Post::select($this->selectFields())->where('idUser', $id)->where('active', true)->get();
        return $posts;
    }

    private function selectFields()
    {
        return ['idPost', 'idUser', 'haveimage', 'imagename', 'message', 'desc'];
    }
}
