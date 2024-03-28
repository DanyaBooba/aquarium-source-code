<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('sign.up.index');
    }

    public function email()
    {
        return view('sign.up.email');
    }

    public function store()
    {
        // $begin = microtime(true);
        // $arf = App\Roles::where('description', 'test')->get();
        // $end = microtime(true) - $begin;

        // session(['login' => 'login']);
        // session(['email' => 'danil.dybko@gmail.com']);
        // session(['avatar' => 'MAN1']);

        dd('123');

        return '123';

        // return redirect()->route('user');
    }
}
