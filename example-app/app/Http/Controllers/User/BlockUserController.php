<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlockUserController extends Controller
{
    public function index()
    {
        return view('user.blocked', [
            'status' => 1,
            'hours' => 3,
            'min' => 3,
            'sec' => 10,
        ]);
    }
}
