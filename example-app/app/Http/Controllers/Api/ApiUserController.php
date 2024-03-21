<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function all()
    {


        return "all";
    }

    public function id($id)
    {
        // User::query()->create([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        //     'password' => bcrypt($validated['password']),
        // ]);

        $user = User::findOrFail($id);

        dd($user);

        return "id: " . $id;
    }

    public function nickname($nickname)
    {
        return "nickname: " . $nickname;
    }
}
