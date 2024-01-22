<?php
require_once '../database/Database.php';

class User {
    private $connection;
    
    public function __construct() {
        $this->connection = new Database();
    }

    public function getFitwork() {
     $query = "SELECT id, hari, tanggal, no_body, pramudi, no_induk, jam_masuk, jam_keluar FROM fit_work";
     $result = $this->connection->getConnection()->query($query);
     
     if (!$result) {
         die("Error: " . $this->connection->getConnection()->error);
     }
     
     return $result->fetch_all(MYSQLI_ASSOC);
 }

}

?>