<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Restore;
use App\Models\User\User;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function index()
    {
        return view('sign.restore.index');
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

        $findCode = Restore::where('idUser', $findUser->id)->first();
        $needToCreateRestore = true;
        $code = str_shuffle(random_string(10) . str_shuffle($findUser->email) . random_string(10) . $findUser->id);

        if ($findCode) {
            $diff = $findCode->unixtimeToLife - time();
            if ($diff <= 0) {
                $findCode->delete();
            } else {
                $code = $findCode->code;
                $needToCreateRestore = false;
            }
        }

        if ($needToCreateRestore) {
            $findCode = Restore::query()->create([
                'unixtimeCreate' => time(),
                'unixtimeToLife' => time() + 3_600,
                'idUser' => $findUser->id,
                'code' => $code,
            ]);
        }

        send_mail_restore_password($validated['email'], $code);

        return redirect()->route('auth.restore.success');
    }

    public function success()
    {
        return view('sign.restore.success');
    }
}
