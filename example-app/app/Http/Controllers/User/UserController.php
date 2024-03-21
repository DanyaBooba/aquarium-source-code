<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $profile = (object) [
            "username" => "123",
        ];

        return view('user.index', [
            "profile" => $profile,
        ]);
    }

    public function search()
    {
        $user = (object) [
            "id" => 1,
            "name" => "Даниил Дыбка",
            "username" => "ddybka",
            "desc" => "Описание",
            "avatar" => "MAN2",
            "avatarDefault" => true,
            "sub" => true,
        ];

        $users = array_fill(0, 30, $user);

        return view('user.search', [
            "users" => $users
        ]);
    }


    public function notifications()
    {
        return view('user.notifications');
    }

    public function achievements()
    {
        return view('user.achievements');
    }

    public function feed()
    {
        return view('user.feed');
    }

    public function trends()
    {
        return view('user.trends');
    }

    public function delete()
    {
        return view('user.delete');
    }
}
