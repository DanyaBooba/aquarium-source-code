<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
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
        // dd($request->old());

        $validated = $request->validate([
            'password' => ['required', 'string', 'min:3', 'max:300'],
            'email' => ['required', 'string', 'max:300', 'min: 3', 'email', 'exists:users,email'],
        ]);

        dd($validated);
        // dd($find);

        // session(['login' => 'login']);
        // session(['email' => $validated['email']]);
        // session(['avatar' => 'MAN1']);

        // return redirect()->back()->withInput($validated);
        // return redirect()->route('user');
    }
}
