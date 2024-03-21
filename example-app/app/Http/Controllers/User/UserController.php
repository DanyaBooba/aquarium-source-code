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
        $user1 = (object) [
            "id" => 1,
            "name" => "Даниил Дыбка",
            "username" => "ddybka",
            "desc" => "Описание",
            "avatar" => "MAN2",
            "avatarDefault" => true,
            "sub" => true,
            "male" => true
        ];

        $user2 = (object) [
            "id" => 10,
            "name" => "Потап Геннадич",
            "username" => "iyoour",
            "desc" => "ХА-ХА!",
            "avatar" => "MAN6",
            "avatarDefault" => true,
            "sub" => false,
            "male" => true
        ];

        $user3 = (object) [
            "id" => 1,
            "name" => "Варнава",
            "username" => "baby",
            "desc" => "Малыш",
            "avatar" => "WOMAN4",
            "avatarDefault" => true,
            "sub" => true,
            "male" => false
        ];

        $users = [];

        for ($i = 0; $i < 5; $i++) {
            array_push($users, $user1);
            array_push($users, $user2);
            array_push($users, $user3);
        }

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
