<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('sign.in.index');
    }

    public function email()
    {
        return view('sign.in.email');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:300', 'min: 3', 'email'],
            'password' => ['required', 'string', 'min:3', 'max:300'],
        ]);

        session(['login' => 'login']);
        session(['email' => $validated['email']]);
        session(['avatar' => 'MAN1']);

        return redirect()->route('user.index');
    }
}
