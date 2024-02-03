<?php
session_start();
include('../database/Database.php');

$connection = new Database();
$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_ramp       = $_POST['id_ramp'];
    $id_fit        = $_POST['id_fit'];
    $kategori      = $_POST['kategori'];
    $item          = $_POST['item'];
    $kondisi       = $_POST['kondisi'];
    $keterangan    = $_POST['keterangan'];

    // Check if a new file is uploaded
    if ($_FILES['gambar']['size'] > 0) {
        $gambar_files   = $_FILES['gambar'];
        $gambar_name    = $gambar_files['name'];
        $gambar_tmp     = $gambar_files['tmp_name'];
        $gambar_path    = '../uploads/' . $kategori . '/';

        move_uploaded_file($gambar_tmp, $gambar_path . $gambar_name);
    } else {
        // No new file uploaded, retain the existing file name
        $gambar_name = $_POST['existing_gambar'];
    }

    $sql = "UPDATE rampcheck2 SET id_fit='$id_fit', kategori='$kategori', item='$item', kondisi='$kondisi', gambar='$gambar_name', keterangan='$keterangan'
             WHERE id_ramp=$id_ramp";

    if ($connection->getConnection()->query($sql) === TRUE) {
        $_SESSION['success_update'] = "Data Rampcheck berhasil diupdate!";
        header("Location: ../views/rampcheck-add.php?id=$id");
        exit();
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>