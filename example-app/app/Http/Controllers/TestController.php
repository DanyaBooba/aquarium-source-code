<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
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

        list($type, $data) = explode(';', $data);
        list(, $data) = explode(',', $data);

        $folder = public_path() . "/upload/";
        if (!is_dir($folder)) {
            mkdir($folder, 0777, true);
        }
        $data = base64_decode($data);
        $image_name = time() . '.jpg';
        $path = $folder . $image_name;

        file_put_contents($path, $data);

        return response()->json([
            'success' => 'done',
            'path' => $path
        ]);
    }
}
