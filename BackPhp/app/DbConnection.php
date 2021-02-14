<?php

namespace App;

use PDO;

class DbConnection
{
    private PDO $connection;

    public function __construct()
    {
        $this->connection = new PDO('mysql:host=example_mysql;dbname=example', 'example', 'example');
    }

    public function getConnection(): PDO
    {
        return $this->connection;
    }
}