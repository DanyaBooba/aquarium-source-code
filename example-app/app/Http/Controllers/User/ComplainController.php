<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Complain;
use App\Models\User\Complain as UserComplain;
use App\Models\User\User;
use Illuminate\Http\Request;

class ComplainController extends Controller
{
    public function index($id)
    {
        $findUser = User::where('id', $id)->first();

        if ($findUser === null) return redirect()->back();

        $findUserSession = User::where('email', session('email'))->first();

        if ($findUserSession === null) return redirect()->back();

        if ($findUser->id == $findUserSession->id) return redirect()->back();

        if ($findUser->usertype === -1 || $findUserSession->usertype === -1) return redirect()->back();

        UserComplain::query()->create([
            'idUser' => $findUser->id,
            'idUserFrom' => $findUserSession->id,
        ]);

        return redirect()->back()->with('alert.success', __('Спасибо за обращение, мы проверим профиль человека'));;
    }
}
