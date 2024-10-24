<?php

namespace App\Http\Controllers\User\ShowUser;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\User\Achiv;
use App\Models\User\Post;
use Illuminate\Http\Request;

class ShowUserController extends Controller
{
    public function nickname($nickname)
    {
        $user = User::where('username', $nickname)->firstOrFail();
        return $this->getUser($user);
    }

    public function id($id)
    {
        $user = User::where('id', $id)->firstOrFail();
        return $this->getUser($user);
    }

    private function getUser(User $user)
    {
        $itsme = false;
        $issub = false;

        $profile = get_user($user);
        $userSession = user_profile();

        $posts = Post::where('active', 1)->where('idUser', $profile->id)->orderBy('created_at', 'desc')->get();

        $subs = User::select('id', 'firstName', 'lastName', 'avatar', 'avatarDefault')
            ->whereIn('id', json_decode($user->subsJson ?? "[]"))->get();
        $sub = User::select('id', 'firstName', 'lastName', 'avatar', 'avatarDefault')
            ->whereIn('id', json_decode($user->subJson ?? "[]"))->get();
        $achivs = Achiv::select('id', 'name')
            ->whereIn('id', json_decode($user->achivsJson ?? "[]"))->get();

        $countAllPosts = Post::where('idUser', $user->id)->where('active', 1)->count();

        $listData = [
            $subs,
            $sub,
            $achivs
        ];

        if ($userSession !== null) {
            if ($userSession->id === $profile->id) $itsme = true;
            $issub = in_array($userSession->id, (array) json_decode($profile->subsJson));
            if ($userSession->usertype != 100 && $profile->verified != 1) {
                return view('errors.418');
            }
        } else {
            if ($profile->verified != 1) {
                return view('errors.418');
            }
        }

        return view('user.show', [
            'profile' => $profile,
            'itsme' => $itsme,
            'issub' => $issub,
            'posts' => $posts,
            'listData' => $listData,
            'countAllPosts' => $countAllPosts
        ]);
    }
}
