<?php
class dbConnection {
    private static $instance;
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;

    public function __construct() {
        require_once 'config.php';

        $this->host = DB_HOST;
        $this->username = DB_USERNAME;
        $this->password = DB_PASSWORD;
        $this->database = DB_NAME;

        try {
            $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
            if ($this->connection->connect_error) {
                throw new Exception("Connection failed: " . $this->connection->connect_error);
            }
        } catch (Exception $e) {
            die("Error: " . $e->getMessage());
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new dbConnection();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->connection;
    }

    public function closeConnection() {
        if ($this->connection) {
            $this->connection->close();
        }
    }

    // CRUD operations
    public function query($sql) {
        $result = $this->connection->query($sql);

        if (!$result) {
            die("Query failed: " . $this->connection->error);
        }

        return $result;
    }

    public function insert($table, $data) {
    }

    public function update($table, $data, $where) {
    }

    public function delete($table, $where) {
    }

    public function select($table, $columns = '*', $where = null, $orderBy = null, $limit = null) {
    }
}
