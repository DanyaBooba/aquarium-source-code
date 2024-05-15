<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\Restore;
use App\Models\User\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class EnterRestoreController extends Controller
{
    public function index($code)
    {
        $findCode = Restore::where('code', $code)->first();

        if ($findCode === null) {
            return redirect()->route('main');
        }

        return view('sign.restore.enter', [
            'code' => $code
        ]);
    }

    public function store($code, Request $request)
    {
        $validated = $request->validate([
            'password' => ['required', 'string', 'min:3', 'max:254', Password::min(3)->letters()->numbers()],
        ]);

        $findCode = Restore::where('code', $code)->first();

        if ($findCode === null) {
            return redirect()->route('main');
        }

        $findUser = User::where('id', $findCode->idUser)->first();

        if ($findUser === null) {
            return redirect()->route('main');
        }

        $findUser->password = bcrypt($validated['password']);
        $findUser->save();

        $findCode->delete();

        return redirect()->route('auth.signin.email');
    }
}
