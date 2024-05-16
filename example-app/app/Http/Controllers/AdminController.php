<?php

namespace App\Http\Controllers;

use App\Models\User\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::get();

        return view('admin.index', [
            'users' => $users
        ]);
    }
}
