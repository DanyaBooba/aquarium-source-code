<?php

namespace App\Http\Controllers\User\Post;

use App\Http\Controllers\Controller;
use DOMDocument;
use Illuminate\Http\Request;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
// use GuzzleHttp\Psr7\Request;

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

                $client = new \GuzzleHttp\Client();
                // $response = $client->get("https://aquariumsocial.ru");
                // $response = $client->get("https://t.me/aquariumsocial/202");
                $response = $client->get("https://books.toscrape.com/");

                $resp['statusCode'] = $response->getStatusCode();
                $resp['bodyContents'] = $response->getBody()->getContents();

                $html = (string) $response->getBody();

                // dd($resp);

                $dom = new DOMDocument();
                @$dom->loadHTML($html);


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
