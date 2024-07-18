<?php
class db_connect
{
    private $server = "localhost";
    private $usernme = "root";
    private $password = "";
    private $database = "covid_19";
    public $connection;

    function __construct()
    {
        $this->connection = null;
        $this->connection = new mysqli($this->server, $this->usernme, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Connection failed" . $this->connection->connect_error);
        }

        return $this->connection;
    }
}