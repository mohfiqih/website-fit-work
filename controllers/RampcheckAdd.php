<?php
session_start();
include('../database/Database.php');

$connection = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $id_fit     = $_POST['id_fit'];
    $kategori   = $_POST['kategori'];
    $item       = $_POST['item'];
    $kondisi    = $_POST['kondisi'];
    $gambar     = $_POST['gambar'];
    $keterangan = $_POST['keterangan'];

    
    $sql = "INSERT INTO rampcheck2 (id_fit, kategori, item, kondisi, gambar, keterangan) 
            VALUES ('$id_fit', '$kategori', '$item', '$kondisi', '$gambar', keterangan)";

    if ($connection->getConnection()->query($sql) === TRUE) {
        $_SESSION['success_add'] = "Data Rampcheck berhasil ditambahkan!";
        header("Location: ../views/rampcheck-add.php?id=$id");
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>