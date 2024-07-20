<?php
require_once 'DatabaseConnection.php';

class Database {
    private $connection;

    public function __construct() {
        $this->connection = DatabaseConnection::getInstance()->getConnection();
    }

    public function query($sql) {
    }

    public function insert($table, $data) {
    }

    public function update($table, $data, $where) {
    }

    public function delete($table, $where) {
    }

    public function select($table, $columns = '*', $where = null, $orderBy = null, $limit = null) {
    }

    // Additional methods

    public function beginTransaction() {
        $this->connection->begin_transaction();
    }

    public function commit() {
        $this->connection->commit();
    }

    public function rollback() {
        $this->connection->rollback();
    }

    public function lastInsertId() {
        return $this->connection->insert_id;
    }

    public function affectedRows() {
        return $this->connection->affected_rows;
    }
}
