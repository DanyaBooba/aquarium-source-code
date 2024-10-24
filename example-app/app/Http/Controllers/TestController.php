<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return view('user.settings.test');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'avatar' => ['required', 'file', 'image', 'max:1024', 'dimensions:min_width=100, min_height=100, max_width=10000, max_height=10000', 'mimes:jpg,jpeg,avi,webp'],
        ]);

        dd($validated);

        // $user = User::where('email', session('email'))->firstOrFail();
        // $image = $validated['avatar'];

        // $imageName = random_image_path($user->id, $image->extension());

        // $pathImage = $image->storeAs('loads', $imageName, 'image_load');

        // if (env('APP_ENV') == 'production') {
        //     $path = env('APP_URL') . '/public/' . $pathImage;
        // } else {
        //     $path = env('APP_URL') . '/' . $pathImage;
        // }

        // $user->avatar = $path;
        // $user->avatarDefault = false;
        // $user->save();

        return redirect()->route('settings')->with('alert.success', __('Сохранено!'));
    }

    public function test2(Request $request)
    {
        $data = $request->image;

        if (get_image_size_from_base64($request->image) > user_max_image_size()) {
            abort(403);
        }

        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);

        $folder = public_path() . '/loads/';
        if (!is_dir($folder)) mkdir($folder, 0777, true);

        $user = user_profile();

        $data = base64_decode($data);
        $imageName = random_image_path($user->id, 'jpg');
        $path = $folder . $imageName;

        file_put_contents($path, $data);

        if (env('APP_ENV') == 'production') {
            $fullPath = env('APP_URL') . '/public/loads/' . $imageName;
        } else {
            $fullPath = env('APP_URL') . '/loads/' . $imageName;
        }

        $user->avatar = $fullPath;
        $user->avatarDefault = false;
        $user->save();

        return response()->json([
            'success' => 'done',
            'data' => $request->image,
            'size' => get_image_size_from_base64($request->image),
            'max' => get_image_size_from_base64($request->image) > user_max_image_size(),
        ]);
    }
}
