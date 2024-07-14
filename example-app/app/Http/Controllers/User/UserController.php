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
        $user = User::where('email', session('email'))->first();
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

        $posts = Post::where('idUser', $user->id)->get();

        return view('user.index', [
            'profile' => $profile,
            'posts' => $posts,
            'listData' => $listData
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
        $posts = Post::where('active', 1)->get();

        foreach($posts as $post) {
            $user = User::where('id', $post->idUser)->first();
            $post->userAvatar = $user->avatar;
            $post->userAvatarDefault = $user->avatarDefault;
            $post->userName = profile_display_name($user->firstName, $user->lastName);
        }

        return view('user.feed', [
            'posts' => $posts
        ]);
    }

    public function trends()
    {
        return view('user.trends');
    }

    public function delete()
    {
        return view('user.delete');
    }

    public function changeToSecondAccount()
    {
        if (have_second_account() == false) return redirect()->back();

        $oldEmail = session('prev_email');
        $oldId = session('prev_id');
        $secondEmail = session('email');
        $secondId = session('id');

        session([
            'email' => $oldEmail,
            'id' => $oldId,
            'prev_email' => $secondEmail,
            'prev_id' => $secondId,
        ]);

        return redirect()->route('user');
    }

    public function removeSecondAccount()
    {
        if (have_second_account() == false) return redirect()->back();
        exit_second_account();
        return redirect()->route('user');
    }
}
