<?php
require_once '../database/Database.php';

class User {
    private $connection;
    
    public function __construct() {
        $this->connection = new Database();
    }

    public function getFitwork() {
     $query = "SELECT id, hari, tanggal, no_body, no_polisi, lokasi_start, koridor, shift, pramudi, depo, no_induk, jam_masuk, jam_keluar, 
               jas, dasi, peci, pantofel, seragam_kerja, id_card, kip,
               sim, stnk, kir, kp,
               flazz, p3k, handsanitizer, senter,
               tekanan_darah, suhu_badan
               FROM fit_work";
               
     $result = $this->connection->getConnection()->query($query);
     
     if (!$result) {
         die("Error: " . $this->connection->getConnection()->error);
     }
     
     return $result->fetch_all(MYSQLI_ASSOC);
 }

}

?>