<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        return view('user.settings.notifications');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'authorization' => ['nullable', 'boolean'],
            'data_change' => ['boolean'],
            'password_change' => ['boolean'],
        ]);

        dd($validated);

        return redirect()->route('settings');
    }
}
