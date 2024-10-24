<?php

namespace App\Http\Controllers\User\Settings;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppearanceLoadFileController extends Controller
{
    public function store(Request $request)
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

        $oldAvatar = explode('/', $user->avatar);
        $oldAvatar = $oldAvatar[count($oldAvatar) - 1];

        Storage::disk('image_load')->delete('/loads/' . $oldAvatar);

        $user->avatar = $fullPath;
        $user->avatarDefault = false;
        $user->save();

        session([
            'alert.success' => __('Сохранено!')
        ]);

        return response()->json([
            'success' => 'done',
            'path' => $folder . $oldAvatar
        ]);
    }
}
