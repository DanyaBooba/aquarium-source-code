<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    // public function signin()
    // {
    //     return view('sign.in.index');
    // }

    // public function signinpost(Request $request)
    // {
    //     $validated = $request->validate([
    //         'email' => ['required', 'string', 'max:300', 'min: 3', 'email'],
    //         'password' => ['required', 'string', 'min:3', 'max:300'],
    //     ]);

    //     session(['login' => 'login']);
    //     session(['email' => $validated['email']]);
    //     session(['avatar' => 'MAN1']);

    //     return redirect()->route('user.index');
    // }

    // public function signup()
    // {
    //     return view('sign.up.index');
    // }

    // public function signuppost(Request $request)
    // {
    //     $validated = $request->validate([
    //         'email' => ['required', 'string', 'max:300', 'min: 3', 'email'],
    //         'password' => ['required', 'string', 'min:3', 'max:300'],
    //         'agreement' => ['accepted'],
    //     ]);

    //     // session(['login' => 'login']);
    //     // session(['email' => $validated['email']]);
    //     // session(['avatar' => 'MAN1']);

    //     dd($validated);

    //     return redirect()->route('user.index');
    // }

    public function help()
    {
        return view('sign.help');
    }

    public function restore()
    {
        return view('sign.restore.index');
    }

    public function code()
    {
        return view('sign.code.index');
    }
}
