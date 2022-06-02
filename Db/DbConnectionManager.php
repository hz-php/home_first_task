<?php

namespace Db;

require_once 'ConnectionManager.php';


class DbConnectionManager implements ConnectionManager
{
    private $conn;

    public function __construct()
    {
        $this->conn = new \PDO('mysql:host=localhost;dbname=test_task;charset=utf8', 'root', '');

    }

    public function getConnection()
    {
        return $this->conn;
    }

}