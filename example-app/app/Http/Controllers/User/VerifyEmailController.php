<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class VerifyEmailController extends Controller
{
    public function view()
    {
        return view('verify.email');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:254', 'min: 3', 'email'],
        ]);

        $findUser = User::where('email', $validated['email'])->first();

        if ($findUser !== null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Пользователь уже существует.')
            ]);
        }

        $profile = user_profile();

        $profile->email = $validated['email'];
        $profile->verified = false;
        $profile->save();

        session([
            'email' => $validated['email']
        ]);

        $code = set_new_verify();
        send_mail_verify($validated['email'], $code);

        return redirect()->route('user');
    }
}
