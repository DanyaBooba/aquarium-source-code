<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $verified = User::where('email', '=', session('email'))->first()->verified;

        return view('user.settings.index', [
            'verified' => $verified,
        ]);
    }

    public function profile()
    {
        $user = User::where('email', '=', session('email'))->first();

        $profile = get_user($user);

        return view('user.settings.profile', [
            'profile' => $profile
        ]);
    }

    public function profile_store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['nullable', 'string', 'max:254', 'min: 3'],
            'firstName' => ['nullable', 'string', 'min:2', 'max:254'],
            'lastName' => ['nullable', 'string', 'min:2', 'max:254'],
            'desc' => ['nullable', 'string', 'min:2', 'max:254'],
        ]);

        if (!empty($validated['username']) && !ctype_alnum($validated['username'])) {
            return redirect()->route('settings.profile')->withErrors([
                'username' => __('Имя пользователя может содержать только латинские буквы в нижнем регистре и цифры.')
            ]);
        }

        $username = strtolower($validated['username']);

        $findUser = User::where('username', '=', $username)->where('email', '<>', session('email'))->first();

        if ($findUser !== null) {
            return redirect()->route('settings.profile')->withErrors([
                'username.exist' => __('Данное имя пользователя уже занято.')
            ]);
        }

        $find = User::where('email', '=', session('email'))->first();

        $find->username = $username;
        $find->firstName = $validated['firstName'];
        $find->lastName = $validated['lastName'];
        $find->desc = $validated['desc'];

        $find->save();

        return redirect()->route('settings.profile');
    }

    public function password()
    {
        return view('user.settings.profile.password');
    }

    public function notifications()
    {
        return view('user.settings.notifications');
    }

    public function notifications_store(Request $request)
    {
        $validated = $request->validate([
            'authorization' => ['nullable', 'boolean'],
            'data_change' => ['boolean'],
            'password_change' => ['boolean'],
        ]);

        dd($validated);

        return redirect()->route('settings');
    }

    public function privacy()
    {
        return view('user.settings.privacy');
    }

    public function storage()
    {
        return view('user.settings.storage');
    }

    public function devices()
    {
        return view('user.settings.devices');
    }

    public function appearance()
    {
        $user = User::where('email', '=', session('email'))->first();

        $profile = get_user($user);

        return view('user.settings.appearance', [
            'profile' => $profile
        ]);
    }

    public function appearance_store(Request $request)
    {
        $validated = $request->validate([
            'icon' => ['required', 'integer', 'min: 1', 'max: 7'],
            'bg' => ['required', 'integer', 'min:1', 'max:11'],
        ]);

        $user = User::where('email', '=', session('email'))->first();

        $user->avatarDefault = true;
        $user->capDefault = true;

        $user->avatar = 'MAN' . $validated['icon'];
        $user->cap = 'BG' . $validated['bg'];

        $user->save();

        return redirect()->route('settings.appearance');
    }

    public function language()
    {
        return view('user.settings.language');
    }

    public function themes()
    {
        return view('user.settings.themes');
    }

    public function test()
    {
        return view('user.settings.test');
    }
}
