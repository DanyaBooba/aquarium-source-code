<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImportPostController extends Controller
{
    public function index()
    {
        return view('user.importpost');
    }

    public function post()
    {
        return "import";
    }
}
