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

    public function import($platform)
    {
        $url = $_GET['url'];

        if (!filter_var($url, FILTER_VALIDATE_URL)) {
            return redirect()->route('user.importpost')->withErrors([
                'notlink' => 'Введенный текст не является ссылкой.'
            ]);
        }

        return "ok";
    }
}
