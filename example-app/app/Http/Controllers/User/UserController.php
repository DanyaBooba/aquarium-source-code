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
        $notifications = (object) [
            [
                'title' => 'page',
                'desc' => 'info'
            ],
            [
                'title' => 'page',
                'desc' => 'info'
            ],
            [
                'title' => 'page',
                'desc' => 'info'
            ],
            [
                'title' => 'page',
                'desc' => 'info'
            ],
        ];

        return view('user.notifications', [
            'notifications' => $notifications
        ]);
    }

    public function achievements()
    {
        $findUser = User::where('email', session('email'))->first();

        $achievements = json_decode($findUser->achivsJson);

        $achievements = $achievements ?? (object) [
            [
                'title' => __('телеграм подписчик'),
                'img' => 'achiv-1'
            ],
            [
                'title' => __('поддержка соцсети!'),
                'img' => 'achiv-2'
            ],
            [
                'title' => __('основатель'),
                'img' => 'achiv-3'
            ],
            [
                'title' => __('яркая личность'),
                'img' => 'achiv-4'
            ],
        ];

        return view('user.achievements', [
            'achievements' => $achievements
        ]);
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
