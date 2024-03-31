<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function nickname($nickname)
    {
        $itsme = false;

        $user = User::where('username', '=', $nickname)->first();
        $profile = get_user($user);

        $userSession = User::where('email', session('email'))->first();
        if ($userSession !== null) {
            if ($userSession->email === $profile->email) {
                $itsme = true;
            }
        }

        return view('user.show', [
            "profile" => $profile,
            "itsme" => $itsme,
        ]);
    }

    public function id($id)
    {
        $itsme = false;

        $user = User::where('id', '=', $id)->firstOrFail();
        $profile = get_user($user);

        $userSession = User::where('email', session('email'))->first();

        if ($userSession !== null) {
            if ($userSession->id === $profile->id) {
                $itsme = true;
            }
        }

        return view('user.show', [
            "profile" => $profile,
            "itsme" => $itsme,
        ]);
    }
}
