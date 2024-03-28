<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

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
            'email' => ['required', 'string', 'max:300', 'min: 3', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:3', 'max:300', Password::min(3)->letters()->numbers()],
        ]);

        $avatar = 'MAN' . random_int(1, 10);
        $bg = 'BG' . random_int(1, 11);

        User::query()->create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'avatar' => $avatar,
            'cap' => $bg,
        ]);

        session(['login' => 'firstLogin']);
        session(['email' => $validated['email']]);
        session(['avatar' => $avatar]);

        return redirect()->route('user');
    }
}
