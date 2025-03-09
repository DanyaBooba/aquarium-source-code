<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Achiv;
use App\Models\User\Notification;
use App\Models\User\Post;
use App\Models\User\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = user_profile();
        $profile = get_user($user, true);

        $subs = User::select('id', 'firstName', 'lastName', 'avatar', 'avatarDefault')
            ->whereIn('id', json_decode($user->subsJson ?? "[]"))->get();
        $sub = User::select('id', 'firstName', 'lastName', 'avatar', 'avatarDefault')
            ->whereIn('id', json_decode($user->subJson ?? "[]"))->get();
        $achivs = Achiv::select('id', 'name')
            ->whereIn('id', json_decode($user->achivsJson ?? "[]"))->get();

        $listData = [
            $subs,
            $sub,
            $achivs,
        ];

        $posts = Post::where('idUser', $user->id)->where('active', 1)->orderBy('updated_at', 'desc')->get();
        $privatePosts = Post::where('idUser', $user->id)->where('active', 0)->orderBy('updated_at', 'desc')->get();
        $nullPosts = Post::where('idUser', $user->id)->where('active', -1)->orderBy('updated_at', 'desc')->get();

        $countAllPosts = Post::where('idUser', $user->id)->count();

        return view('user.index', [
            'profile' => $profile,
            'posts' => $posts,
            'privatePosts' => $privatePosts,
            'nullPosts' => $nullPosts,
            'listData' => $listData,
            'countAllPosts' => $countAllPosts
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
        $findUser = user_profile();

        $notifications = Notification::where('iduser', $findUser->id)->orderBy('created_at', 'desc')->get();

        session()->forget('notificationsUnread');

        return view('user.notifications', [
            'notifications' => $notifications,
            'count' => count($notifications)
        ]);
    }

    public function achievements()
    {
        $findUser = user_profile();
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
        $posts = Post::where('active', 1)->orderBy('updated_at', 'desc')->take(50)->get();

        foreach ($posts as $post) {
            $user = User::where('id', $post->idUser)->first();
            $post->userAvatar = $user->avatar;
            $post->userAvatarDefault = $user->avatarDefault;
            $post->userName = profile_display_name($user->firstName, $user->lastName);
        }

        return view('user.feed', [
            'posts' => $posts,
        ]);
    }

    public function delete()
    {
        return view('user.delete');
    }

    public function test()
    {
        return view('user.test');
    }
}
