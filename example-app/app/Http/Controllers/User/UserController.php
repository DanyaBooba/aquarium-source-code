<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('email', session('email'))->where('id', session('id'))->first();

        $profile = (object) [
            "id" => $user->id,
            "username" => $user->username,
            "name" => profile_display_name($user->firstName, $user->lastName),
            "desc" => $user->desc,
            "avatarDefault" => $user->avatarDefault,
            "avatar" => $user->avatar,
            "capDefault" => $user->capDefault,
            "cap" => $user->cap,
            "subs" => isset_value($user->subs, 0),
            "sub" => isset_value($user->sub, 0),
            "achivs" => isset_value($user->achivs, 0),
            "local" => true,
            "status" => $user->verified ? "active" : "needConfirm",
        ];

        return view('user.index', [
            "profile" => $profile,
        ]);
    }

    public function search()
    {
        $usersRow = User::orderByDesc('created_at')->get();
        $users = [];

        foreach ($usersRow as $user) {
            $userRow = (object) [
                'id' => $user->id,
                'name' => profile_display_name($user->firstName, $user->lastName),
                'username' => $user->username,
                'desc' => $user->desc,
                'avatar' => $user->avatar,
                'avatarDefault' => $user->avatarDefault,
                'sub' => random_int(0, 1),
                'male' => true,
            ];

            array_push($users, $userRow);
        }

        $users = (object) $users;

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
