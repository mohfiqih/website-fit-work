<?php

class Database {
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "database_fit_work";
    protected $connection;

    public function __construct() {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }

        $this->connection->set_charset("utf8");
    }

    public function getConnection() {
        return $this->connection;
    }

    public function query($sql) {
        return $this->connection->query($sql);
    }

    public function escapeString($string) {
        return $this->connection->real_escape_string($string);
    }

    public function getError() {
        return $this->connection->error;
    }
}
?>