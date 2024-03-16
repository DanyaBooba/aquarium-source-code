<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function nickname(Request $request)
    {
        $profile = (object) [
            "username" => "123",
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
