<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function nickname($nickname)
    {
        // $query = User::first()->email;
        // $query = User::where('username', '=', $nickname)->first();

        // dd($query);

        // $profile = (object) [
        //     "nickname" => "123",
        // ];

        $profile = (object) [
            "id" => 123,
            "username" => "ddybka",
            "name" => "Даниил Дыбка",
            "desc" => "Описание профиля.",
            "avatarDefault" => true,
            "avatar" => "MAN7",
            "capDefault" => true,
            "cap" => "BG4",
            "subs" => 300,
            "sub" => 2,
            "achivs" => 5,
            "local" => true
        ];

        return view('user.show', [
            "profile" => $profile,
        ]);
    }

    public function id(Request $request)
    {
        $profile = (object) [
            "id" => 123,
            "username" => "ddybka",
            "name" => "Даниил Дыбка",
            "desc" => "Описание профиля.",
            "avatarDefault" => true,
            "avatar" => "MAN7",
            "capDefault" => true,
            "cap" => "BG4",
            "subs" => 300,
            "sub" => 2,
            "achivs" => 5,
            "local" => true
        ];

        return view('user.show', [
            "profile" => $profile,
        ]);
    }
}
