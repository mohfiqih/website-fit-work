<?php
require_once '../database/Database.php';

$database = new Database(); 

class Rampcheck {
    private $connection;
    
    public function __construct() {
        $this->connection = new Database();
    }

    public function getRampcheckEksterior() {
        $id_fit = $_GET['id'];
        $query = "SELECT id_ramp, id_fit, kategori, item, kondisi, gambar, keterangan
                  FROM rampcheck2
                  WHERE id_fit = $id_fit AND kategori = 'Eksterior'";
               
        $result = $this->connection->getConnection()->query($query);
     
        if (!$result) {
            die("Error: " . $this->connection->getConnection()->error);
        }
     
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getRampcheckInterior() {
        $id_fit = $_GET['id'];
        $query = "SELECT id_ramp, id_fit, kategori, item, kondisi, gambar, keterangan
                  FROM rampcheck2
                  WHERE id_fit = $id_fit AND kategori = 'Interior'";
               
        $result = $this->connection->getConnection()->query($query);
     
        if (!$result) {
            die("Error: " . $this->connection->getConnection()->error);
        }
     
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}

?>