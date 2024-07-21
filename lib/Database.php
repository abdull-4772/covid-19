<?php
require_once 'dbConnection.php';

class Database {
    private $connection;

    public function __construct() {
        $this->connection = dbConnection::getInstance()->getConnection();
    }

    public function getConnection(){
       return $this->connection; 
    }
}