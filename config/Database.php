<?php
require_once __DIR__ .  '/dbConnection.php';

class Database
{
    private $connection;

    public function __construct()
    {
        $this->connection = dbConnection::getInstance()->getConnection();
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function closeConnection()
    {
        dbConnection::getInstance()->closeConnection();
    }
}
