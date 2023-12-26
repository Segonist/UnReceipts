<?php

class Database
{
    public $connection;
    public function __construct($config, $username = "root", $password = "")
    {
        $dsn = $config["dbms_name"] . ":" . http_build_query($config["dsn_config"], "", ";");
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this->connection = new PDO($dsn, $username, $password, $options);
    }
    public function query($query)
    {
        $stmt = $this->connection->prepare($query);
        $stmt->execute();

        return $stmt;
    }
    public function lastInsertid()
    {
        return $this->connection->lastInsertId();
    }
}