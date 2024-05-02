<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User\User;
use Illuminate\Http\Request;

class TestAccountController extends Controller
{
    public function index()
    {
        login_for_test_account();

        return redirect()->route('user');
    }

    public function exit()
    {
        exit_account();

        return redirect()->route('auth.signin');
    }
}
