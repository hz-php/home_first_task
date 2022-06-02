<?php


namespace Classes;
require_once 'ApiQuery.php';


class ArticlesClass extends ApiQuery
{
    public $body;

    function apiQurey()
    {
        $ch = curl_init('https://newsdata.io/api/1/news?apikey=pub_7531e15acc5686c2a4618b2c72cdccbe2344&language=ru');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',)
        );

        $result = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($result, 0, $header_size);
        $this->body = substr($result, $header_size);
        curl_close($ch);
        return $this->body;
    }
}