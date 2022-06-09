<?php

namespace Db;

class QueryManager
{
    private $query;

    public function setArticles(): string
    {
        return $this->query = "INSERT INTO articles (title, link, keywords, description, pubDate, category) VALUES (:title, :link, :keywords, :description, :pubDate, :category)";
    }

    public function getArticles(): string
    {
        return $this->query = "SELECT * FROM articles ORDER BY ID DESC";
    }
}