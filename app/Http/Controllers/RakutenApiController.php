<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RakutenApiController extends Controller
{
    public static function getBookData($title, $keyword, $booksGenreId)
    {
        $url = 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20170404';

        // define("RAKUTEN_APPLICATION_ID", config('app.rakuten_id'));

        $option = [
            'query' => [
                'format'        => 'json',
                'keyword'       => $keyword,
                'applicationId' => config('app.rakuten_id')
            ]
        ];

        if (!empty($title)) {
            $option['query']['title'] = $title;
        }

        if (!empty($booksGenreId)) {
            $option['query']['booksGenreId'] = $booksGenreId; // example: 001005005
        }

        $config = ['base_uri' => 'http://localhost/public/api/'];
        $client = new Client($config);

        $response = $client->request('GET', $url, $option);

        $bookLists = json_decode($response->getBody(), true);

        return $bookLists["Items"];
    }
}
