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
            'email' => ['required', 'string', 'max:254', 'min: 3', 'email'],
            'password' => ['required', 'string', 'min:3', 'max:254', Password::min(3)->letters()->numbers()],
        ]);

        $findUser = User::where(
            'email',
            $validated['email']
        )->first();

        if ($findUser !== null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Пользователь уже существует.')
            ]);
        }

        $avatar = 'MAN' . random_int(1, 7);
        $bg = 'BG' . random_int(1, 11);

        $settings = json_encode(
            [
                'dataChange' => true,
                'authorization' => true,
                'passwordChange' => true,
            ]
        );

        $query = User::query()->create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'avatar' => $avatar,
            'cap' => $bg,
            'settings_notifications' => $settings,
        ]);

        session(['id' => $query->id]);
        session(['email' => $validated['email']]);
        session(['avatar' => $avatar]);
        session(['avatarDefault' => 1]);

        $code = set_new_verify();

        send_mail_verify($validated['email'], $code);
        send_mail_register($validated['email']);

        return redirect()->route('user')->with('alert.success', __('Добро пожаловать!'));
    }
}
