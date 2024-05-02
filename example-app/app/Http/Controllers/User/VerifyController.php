<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerifyController extends Controller
{
    public function viewverify()
    {
        return view('user.viewverify');
    }

    public function setverify()
    {
        set_new_verify();

        return redirect()->back();
    }
}
