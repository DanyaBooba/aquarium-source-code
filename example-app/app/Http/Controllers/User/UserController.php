<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Achiv;
use App\Models\User\Notification;
use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::where('email', session('email'))->first();

        $profile = get_user($user, true);

        $posts = Post::where('idUser', $user->id)->get();

        return view('user.index', [
            "profile" => $profile,
            "posts" => $posts
        ]);
    }

    public function search()
    {
        $usersRow = User::orderByDesc('created_at')->where('verified', 1)->where('usertype', '<>', -1)->get();

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
        $findUser = User::where('email', session('email'))->first();

        $notifications = Notification::where('iduser', $findUser->id)->get();

        return view('user.notifications', [
            'notifications' => $notifications,
            'count' => count($notifications)
        ]);
    }

    public function achievements()
    {
        $findUser = User::where('email', session('email'))->first();
        $achievementsJson = json_decode($findUser->achivsJson) ?? [];
        $achievements = [];
        foreach ($achievementsJson as $idAchiv) {
            $achiv = Achiv::where('id', $idAchiv)->first();
            if ($achiv != null) array_push($achievements, $achiv);
        }

        return view('user.achievements', [
            'achievements' => $achievements,
            'count' => count($achievements)
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
