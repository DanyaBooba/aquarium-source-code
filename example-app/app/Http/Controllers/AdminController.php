<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use App\Models\User\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('admin.index', [
            'users' => $users
        ]);
    }

    public function posts()
    {
        $posts = Post::get();

        return view('admin.posts', [
            'posts' => $posts
        ]);
    }

    public function set_user_active($iduser) 
    {
        $user = User::where('id', $iduser)->first();

        if($user == null) return "не найдено.";

        if($user->verified == 1) return "уже верифицирован.";

        $user->verified = 1;
        $user->save();

        return redirect()->back();
    }

    public function set_user_unactive($iduser) 
    {
        $user = User::where('id', $iduser)->first();

        if($user == null) return "не найдено.";

        if($user->verified == 0) return "еще не верифицирован.";

        if($user->usertype == -1) return "это тестовый аккаунт.";

        if($user->usertype == 100) return "это админ.";
        
        $user->verified = 0;
        $user->save();

        return redirect()->back();
    }

    public function block_user($iduser) 
    {
        $user = User::where('id', $iduser)->first();

        if($user == null) return "не найдено.";

        if($user->usertype == -1) return "это тестовый аккаунт.";

        if($user->usertype == 100) return "это админ.";
        
        $user->blocked = 1;
        $user->save();

        return redirect()->back();
    }
}
