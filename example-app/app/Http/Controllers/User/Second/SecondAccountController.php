<?php

namespace App\Http\Controllers\User\Second;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondAccountController extends Controller
{
    public function change()
    {
        if (have_second_account() == false) return redirect()->back();

        $oldEmail = session('prev_email');
        $oldId = session('prev_id');
        $secondEmail = session('email');
        $secondId = session('id');

        session([
            'email' => $oldEmail,
            'id' => $oldId,
            'prev_email' => $secondEmail,
            'prev_id' => $secondId,
        ]);

        return redirect()->route('user');
    }

    public function remove()
    {
        if (have_second_account() == false) return redirect()->back();
        exit_second_account();
        return redirect()->route('user');
    }
}
