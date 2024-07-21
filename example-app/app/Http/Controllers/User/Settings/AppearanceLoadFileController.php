<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class AppearanceLoadFileController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar' => ['required', 'file', 'image', 'max:1024', 'dimensions:min_width=100, min_height=100, max_width=10000, max_height=10000', 'mimes:jpg,jpeg,avi,webp'],
        ]);

        $user = User::where('email', session('email'))->firstOrFail();
        $image = $validated['avatar'];

        $imageName = random_image_path($user->id, $image->extension());

        $pathImage = $image->storeAs('loads', $imageName, 'image_load');

        if (env('APP_ENV') == 'production') {
            $path = env('APP_URL') . '/public/' . $pathImage;
        } else {
            $path = env('APP_URL') . '/' . $pathImage;
        }

        $user->avatar = $path;
        $user->avatarDefault = false;
        $user->save();

        return redirect()->route('settings')->with('alert.success', __('Сохранено!'));
    }
}
