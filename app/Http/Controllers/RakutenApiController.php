<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class RakutenApiController extends Controller
{
    public function getBookData()
    {
        $url = 'https://app.rakuten.co.jp/services/api/BooksTotal/Search/20170404';

        // define("RAKUTEN_APPLICATION_ID", config('app.rakuten_id'));

        $option = [
            'query' => [
                'format'        => 'json',
                'title'         => 'Laravel',
                'keyword'       => 'PHP',
                'booksGenreId'  => '001005005',
                'applicationId' => config('app.rakuten_id')
            ]
        ];

        $config = ['base_uri' => 'http://localhost/public/api/'];
        $client = new Client($config);

        $response = $client->request('GET', $url, $option);

        return $response->getBody();
    }
}
