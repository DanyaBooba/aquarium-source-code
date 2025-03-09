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
        $yandexUri = oauth_yandex_link();
        $googleUri = oauth_google_link();
        $githubUri = oauth_github_link();
        $vkUri = oauth_vk_link();

        return view('sign.up.index', [
            'yandexUri' => $yandexUri,
            'googleUri' => $googleUri,
            'githubUri' => $githubUri,
            'vkUri' => $vkUri,
        ]);
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

        $findUser = User::where('email', $validated['email'])->first();

        if ($findUser !== null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Пользователь уже существует.')
            ]);
        }

        $avatar = user_image_random();
        $bg = user_cap_random();

        $settings = json_encode([
            'dataChange' => true,
            'authorization' => true,
            'passwordChange' => true,
        ]);

        $query = User::query()->create([
            'email' => strtolower($validated['email']),
            'password' => bcrypt($validated['password']),
            'avatar' => $avatar,
            'cap' => $bg,
            'settings_notifications' => $settings,
        ]);

        session(['id' => $query->id]);
        session(['email' => $validated['email']]);

        $code = set_new_verify();
        send_mail_verify($validated['email'], $code);

        send_mail_register($validated['email'], true);

        return redirect()->route('user')->with('alert.success', __('Добро пожаловать!'));
    }
}
