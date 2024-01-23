<?php
include('../controllers/Database.php');

$database = new Database(); 

class Rampcheck {
    private $connection;
    
    public function __construct() {
        $this->connection = new Database();
    }

    public function getRampcheck() {
     $query = "SELECT id_ramp, id_fit, kategori, item, gambar, keterangan
                FROM rampcheck2";
               
     $result = $this->connection->getConnection()->query($query);
     
     if (!$result) {
         die("Error: " . $this->connection->getConnection()->error);
     }
     
     return $result->fetch_all(MYSQLI_ASSOC);
 }

}

?>