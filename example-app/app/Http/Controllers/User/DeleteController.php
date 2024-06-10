<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Auth\Code;
use App\Models\Auth\Restore;
use App\Models\User\Post;
use App\Models\User\User;
use App\Models\User\Verify;
use Illuminate\Http\Request;
use App\Models\User\Notification;

class DeleteController extends Controller
{
    public function index()
    {
        $useService = !!User::where('email', session('email'))->first()->serviceLogin;
        return view('user.delete', [
            'useService' => $useService
        ]);
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

        send_mail_delete($findUser->email);

        $findUser->delete();
        exit_account();

        $checkVerifies = Verify::where('email', $validated['email'])->get();
        if (count($checkVerifies) > 0) {
            foreach ($checkVerifies as $verify) {
                $verify->delete();
            }
        }

        $checkPosts = Post::where('idUser', $findUser->id)->get();

        if (count($checkPosts) > 0) {
            foreach ($checkPosts as $post) {
                $post->active = false;
                $post->save();
            }
        }

        $checkRestore = Restore::where('idUser', $findUser->id)->get();
        if (count($checkRestore) > 0) {
            foreach ($checkRestore as $restore) {
                $restore->delete();
            }
        }

        $checkNotify = Notification::where('iduser', $findUser->id)->get();
        if (count($checkNotify) > 0) {
            foreach ($checkNotify as $notify) {
                $notify->active = false;
                $notify->save();
            }
        }

        $checkCodes = Code::where('idUser', $findUser->id)->get();
        if (count($checkCodes) > 0) {
            foreach ($checkCodes as $code) {
                $code->delete();
            }
        }

        return redirect()->route('main');
    }

    public function service(Request $request)
    {
        $validated = $request->validate([
            'confirmDelete' => ['required', 'string', 'max:50']
        ]);

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

        if ($validated['confirmDelete'] !== 'Подтверждаю удаление аккаунта') {
            return redirect()->back()->withInput($validated)->withErrors([
                'confirmDelete' => __('Подтвердите удаление аккаунта.')
            ]);
        }

        send_mail_delete($findUser->email);

        $emailAccount = session('email');
        $idAccount = $findUser->id;
        $findUser->delete();
        exit_account();

        $checkVerifies = Verify::where('email', $emailAccount)->get();
        if (count($checkVerifies) > 0) {
            foreach ($checkVerifies as $verify) {
                $verify->delete();
            }
        }

        $checkPosts = Post::where('idUser', $idAccount)->get();

        if (count($checkPosts) > 0) {
            foreach ($checkPosts as $post) {
                $post->active = false;
                $post->save();
            }
        }

        $checkRestore = Restore::where('idUser', $idAccount)->get();
        if (count($checkRestore) > 0) {
            foreach ($checkRestore as $restore) {
                $restore->delete();
            }
        }

        $checkNotify = Notification::where('iduser', $idAccount)->get();
        if (count($checkNotify) > 0) {
            foreach ($checkNotify as $notify) {
                $notify->active = false;
                $notify->save();
            }
        }

        $checkCodes = Code::where('idUser', $idAccount)->get();
        if (count($checkCodes) > 0) {
            foreach ($checkCodes as $code) {
                $code->delete();
            }
        }

        return redirect()->route('main');
    }
}
