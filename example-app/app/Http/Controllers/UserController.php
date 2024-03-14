<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function search()
    {
        return view('user.search');
    }

    public function settings()
    {
        return view('user.settings.index');
    }

    public function notifications()
    {
        return view('user.notifications');
    }

    public function achievements()
    {
        return view('user.achievements');
    }

    public function feed()
    {
        return view('user.feed');
    }

    public function trends()
    {
        return view('user.trends');
    }

    public function exit()
    {
        return view('user.exit');
    }

    public function exitexactly()
    {
        exit_account();

        return redirect()->route('main.index');
    }

    public function delete()
    {
        return view('user.delete');
    }
}
