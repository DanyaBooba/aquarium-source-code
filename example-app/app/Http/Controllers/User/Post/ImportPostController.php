<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use phpQuery;

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

        switch ($platform) {
            case 'telegram':
                if (!str_contains($url, 't.me')) {
                    return redirect()->route('user.importpost')->withErrors([
                        'notlink' => 'Неверно выбрана платформа или ссылка содержит ошибку.'
                    ]);
                }

                $doc = phpQuery::newDocument(file_get_contents('https://t.me/aquariumsocial/202'));
                dd($doc);

                break;
            case 'vk':
                if (!str_contains($url, 'vk.com')) {
                    return redirect()->route('user.importpost')->withErrors([
                        'notlink' => 'Неверно выбрана платформа или ссылка содержит ошибку.'
                    ]);
                }

                $urlData = file_get_contents($url);
                $html = htmlentities($urlData);
                dd($html);

                break;
        }

        return "ok";
    }
}
