<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LikePostController extends Controller
{
    public function like($id, $idPost)
    {
        return "like " . $id . " " . $idPost;
    }
}
