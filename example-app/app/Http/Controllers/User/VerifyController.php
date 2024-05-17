<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Models\User\Verify;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function viewverify()
    {
        $findUser = User::where('email', session('email'))->first();

        if ($findUser == null) {
            return redirect()->route('main');
        }

        if ($findUser->verified) {
            return redirect()->route('user');
        }

        return view('user.viewverify');
    }

    public function setverify()
    {
        dd('123');

        $code = set_new_verify();
        send_mail_verify(session('email'), $code);

        return redirect()->back();
    }

    public function tryverify($code)
    {
        $findUser = User::where('email', session('email'))->first();

        if ($findUser === null) return redirect()->route('auth.signin');

        $findCode = Verify::where('code', $code)->first();

        if ($findCode === null) return redirect()->back();

        if ($findUser->email !== $findCode->email || $findUser->id !== $findCode->iduser) {
            return redirect()->back();
        }

        $findUser->verified = 1;
        $findUser->save();

        $findCode->delete();

        return redirect()->route('user');
    }
}
