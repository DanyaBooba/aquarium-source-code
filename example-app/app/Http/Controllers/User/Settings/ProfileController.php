<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('email', '=', session('email'))->first();

        $profile = get_user($user);

        return view('user.settings.profile', [
            'profile' => $profile
        ]);
    }

    public function store(Request $request)
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

        if (in_array($validated['username'], black_usernames())) {
            return redirect()->route('settings.profile')->withErrors([
                'username' => __('Данное имя пользователя запрещено.')
            ]);
        }

        $username = strtolower($validated['username']);

        $findUser = User::where('username', '=', $username)->where('email', '<>', session('email'))->first();

        if ($findUser !== null && $username != "") {
            return redirect()->route('settings.profile')->withErrors([
                'username.exist' => __('Данное имя пользователя уже занято.')
            ]);
        }

        $find = User::where('email', '=', session('email'))->first();
        if ($find->usertype == -1) return redirect()->back();

        $find->username = $username;
        $find->firstName = $validated['firstName'];
        $find->lastName = $validated['lastName'];
        $find->desc = $validated['desc'];

        $find->save();

        return redirect()->route('settings.profile')->with('alert.success', __('Сохранено!'));
    }
}
