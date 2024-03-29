<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('email', session('email'))->first();

        $profile = get_user($user, true);

        return view('user.index', [
            "profile" => $profile,
        ]);
    }

    public function search()
    {
        $usersRow = User::orderByDesc('created_at')->get();
        $users = [];

        foreach ($usersRow as $user) {
            $userRow = get_user_search($user);

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
