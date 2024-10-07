<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
// use DOMDocument;
// use Illuminate\Http\Request;

// use GuzzleHttp\Client;
// use GuzzleHttp\Exception\RequestException;
// use GuzzleHttp\Psr7\Request;

// use Sunra\PhpSimple\HtmlDomParser;

class ImportPostController extends Controller
{
    public function index()
    {
        return view('user.importpost');
    }

    public function import($platform)
    {
        require "simple_html_dom.php";

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

                $plainText = file_get_html($url . '?embed=1&mode=tme')->plaintext;
                $textWithDate = substr($plainText, 281);

                $listText = explode(' t.me', $textWithDate);
                $text = $listText[0];

                if (strpos($text, "This media is not supported")) {
                    return redirect()->route('user.importpost')->withErrors([
                        'notlink' => 'Запись не может быть импортирована.'
                    ]);
                }

                if (strpos($text, "VIEW IN TELEGRAM")) {
                    return redirect()->route('user.importpost')->withErrors([
                        'notlink' => 'Запись содержит ошибку.'
                    ]);
                }

                if (mb_strlen($text) < 30) {
                    return redirect()->route('user.importpost')->withErrors([
                        'notlink' => 'Запись слишком короткая.'
                    ]);
                }

                dd('теперь запись можно записать');

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

        return "";

        return redirect()->route('main');
    }

    private function get_content($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
