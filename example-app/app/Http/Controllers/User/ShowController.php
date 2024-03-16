<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function nickname($nickname)
    {
        // $query = User::first()->email;
        $query = User::where('username', '=', $nickname)->first();

        dd($query);

        $profile = (object) [
            "nickname" => "123",
        ];

        return view('user.show', [
            "profile" => $profile,
        ]);
    }

    public function id(Request $request)
    {
        $profile = (object) [
            "username" => "123",
        ];

        return view('user.show', [
            "profile" => $profile,
        ]);
    }
}
