<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function nickname($nickname)
    {
        $user = User::where('username', '=', $nickname)->firstOrFail();
        return $this->getUser($user);
    }

    public function id($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();
        return $this->getUser($user);
    }

    private function getUser(User $user)
    {
        $itsme = false;
        $issub = false;

        $profile = get_user($user);
        $userSession = User::where('email', session('email'))->first();

        if ($userSession !== null) {
            if ($userSession->id === $profile->id) $itsme = true;
            $issub = in_array($userSession->id, (array) json_decode($profile->subsJson));
        }

        return view('user.show', [
            "profile" => $profile,
            "itsme" => $itsme,
            "issub" => $issub
        ]);
    }
}
