<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Code;
use App\Models\User\User;
use Illuminate\Http\Request;

class CodeController extends Controller
{
    public function index()
    {
        return view('sign.code.index');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:254', 'min: 3', 'email'],
        ]);

        $findUser = User::where('email', $validated['email'])->first();

        if ($findUser === null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'user' => __('Пользователь не найден.')
            ]);
        }

        $findCode = Code::where('idUser', $findUser->id)->first();
        $needToCreateCode = true;
        $code = random_code(6);

        if ($findCode) {
            $diff = $findCode->unixtimeToLife - time();
            if ($diff <= 0) {
                $findCode->delete();
            } else {
                $code = $findCode->code;
                $needToCreateCode = false;
            }
        }

        if ($needToCreateCode) {
            $findCode = Code::query()->create([
                'unixtimeCreate' => time(),
                'unixtimeToLife' => time() + 900,
                'idUser' => $findUser->id,
                'code' => $code,
            ]);
        }

        send_mail_login_by_code($validated['email'], $code);

        return redirect()->route('auth.code.enter');
    }
}
