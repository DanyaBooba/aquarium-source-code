<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Code;
use App\Models\User\User;
use Illuminate\Http\Request;

class EnterCodeController extends Controller
{
    public function index()
    {
        return view('sign.code.enter');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:254', 'min:3', 'email'],
            'code' => ['required', 'digits:6'],
        ]);

        $findCode = Code::where('code', $validated['code'])->first();

        if ($findCode === null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'code' => __('Неверный код.')
            ]);
        }

        $findUser = User::where('id', $findCode->idUser)->first();

        if ($findUser === null) {
            $findCode->delete();
            return redirect()->route('main');
        }

        if ($findUser->email != $validated['email']) {
            return redirect()->back()->withInput($validated)->withErrors([
                'email' => __('Неверная почта.')
            ]);
        }

        $findCode->delete();

        session(['id' => $findUser->id]);
        session(['email' => $validated['email']]);
        session(['avatar' => $findUser->avatar ?? 'MAN1']);
        session(['avatarDefault' => $findUser->avatarDefault]);

        if (!$findUser->verified) {
            set_new_verify();
        }

        return redirect()->route('user')->with('alert.success', __('С возвращением!'));
    }
}
