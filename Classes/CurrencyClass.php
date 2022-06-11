<?php

namespace Classes;

use Exception;
use GuzzleHttp\Client;

class CurrencyClass extends ApiQuery
{
    function apiQurey(): string
    {
        $client = new Client();
        $response = $client->request('GET', 'https://www.cbr-xml-daily.ru/daily_json.js');
        if ($response->getStatusCode() !== 200) {
            throw new Exception('Не возможно подключится к сереверу валют');
        }
        return $response->getBody()->getContents();
    }
}
