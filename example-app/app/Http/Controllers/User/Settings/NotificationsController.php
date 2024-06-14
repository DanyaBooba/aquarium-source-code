<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $user = User::where('email', '=', session('email'))->first();

        $profile = get_user($user);

        $default = (object) [
            'dataChange' => false,
            'authorization' => false,
            'passwordChange' => false,
        ];

        $notification = json_decode($profile->settings_notifications) ?? $default;

        return view('user.settings.notifications', [
            'notification' => $notification
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'authorization' => ['nullable', 'boolean'],
            'dataChange' => ['nullable', 'boolean'],
            'passwordChange' => ['nullable', 'boolean'],
        ]);

        $findUser = User::where('email', session('email'))->first();

        $json = $findUser->settings_notifications;

        $data = (object) json_decode($json);

        $data = (object) [
            'authorization' => (bool) ($validated['authorization'] ?? false),
            'dataChange' => (bool) ($validated['dataChange'] ?? false),
            'passwordChange' => (bool) ($validated['passwordChange'] ?? false),
        ];

        $json = json_encode($data);

        $findUser->settings_notifications = $json;

        $findUser->save();

        return redirect()->route('settings.notifications')->with('alert.success', __('Сохранено!'));
    }
}
