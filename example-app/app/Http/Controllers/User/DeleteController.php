<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function index()
    {
        return view('user.delete');
    }

    public function post(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'string', 'max:254', 'min: 3', 'email'],
            'password' => ['required', 'string', 'min:3', 'max:254'],
            'confirmDelete' => ['required', 'string', 'max:50']
        ]);

        if (session('email') !== $validated['email']) {
            return redirect()->back()->withInput($validated)->withErrors([
                'email' => __('Неверная почта.')
            ]);
        }

        $findUser = User::where('email', session('email'))->first();

        if ($findUser === null) {
            return redirect()->back()->withInput($validated)->withErrors([
                'email' => __('Пользователь не найден.')
            ]);
        }

        if ($findUser->usertype === -1) {
            exit_account();
            return redirect()->route('main');
        }

        $passwordConfirm = app('hash')->check($validated['password'], $findUser->password);
        if ($passwordConfirm === false) {
            return redirect()->back()->withInput($validated)->withErrors([
                'password' => __('Некорректный пароль.')
            ]);
        }

        if ($validated['confirmDelete'] !== 'Подтверждаю удаление аккаунта') {
            return redirect()->back()->withInput($validated)->withErrors([
                'confirmDelete' => __('Подтвердите удаление аккаунта.')
            ]);
        }

        $findUser->delete();
        exit_account();

        return redirect()->route('main');
    }
}
