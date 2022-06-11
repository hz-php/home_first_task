<?php
namespace Classes;

use Classes\ApiQuery;
use Exception;
use GuzzleHttp\Client;

class ArticlesClass extends ApiQuery
{
    public $body;

    function apiQurey(): string
    {
        $client = new Client();
        $response = $client->request('GET', 'https://newsdata.io/api/1/news?apikey=pub_7531e15acc5686c2a4618b2c72cdccbe2344&language=ru');
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Не возможно подключится к сереверу');
        }
        return $response->getBody()->getContents();
    }
}
