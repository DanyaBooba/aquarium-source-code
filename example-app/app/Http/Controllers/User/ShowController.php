<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function nickname($nickname)
    {
        $user = User::where('username', '=', $nickname)->first();

        $profile = get_user($user);

        return view('user.show', [
            "profile" => $profile,
        ]);
    }

    public function id($id)
    {
        $user = User::where('id', '=', $id)->firstOrFail();

        $profile = get_user($user);

        return view('user.show', [
            "profile" => $profile,
            "itsme" => true,
        ]);
    }
}
