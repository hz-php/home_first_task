<?php

namespace Db;

use PDO;
use Db\ConnectionManager;

class DbConnectionManager implements ConnectionManager
{
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO('mysql:host=localhost;dbname=test_task;charset=utf8', 'root', 'root');

    }

    public function getConnection(): object
    {
        return $this->conn;
    }

}