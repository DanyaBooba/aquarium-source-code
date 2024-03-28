<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('sign.up.index');
    }

    public function email()
    {
        return view('sign.up.email');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:3', 'max:300'],
            'email' => ['required', 'string', 'max:300', 'min: 3', 'email', 'unique:users,email'],
        ]);

        User::query()->create([
            'username' => 'user123',
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        dd('complete');

        // session(['login' => 'login']);
        // session(['email' => 'danil.dybko@gmail.com']);
        // session(['avatar' => 'MAN1']);

        // return redirect()->route('user');
    }
}
