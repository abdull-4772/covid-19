<?php
require_once 'dbConnection.php';
// this is your DATABASE you can use it anywhere.
class Database
{
    private $connection;

    // Step 1: connection is ready through this Construct.
    public function __construct()
    {
        $this->connection = dbConnection::getInstance()->getConnection();
    }

    // Step 2: you can GET your connection to this method.
    public function getConnection()
    {
        return $this->connection;
    }

    // Step 3: you can CLOSE your connection to this method.
    public function closeConnection()
    {
        $conn = new dbConnection;
        $conn->closeConnection();
    }
}
