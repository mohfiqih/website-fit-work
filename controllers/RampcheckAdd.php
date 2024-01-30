<?php
session_start();
include('../database/Database.php');

$connection = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_fit     = $_POST['id_fit'];
    $kategori   = $_POST['kategori'];
    $item       = $_POST['item'];
    $kondisi    = $_POST['kondisi'];
    $keterangan = $_POST['keterangan'];
    $gambar_files = $_FILES['gambar'];
    
    for ($i = 0; $i < count($gambar_files['name']); $i++) {
        $gambar = $gambar_files['name'][$i];
        $gambar_temp = $gambar_files['tmp_name'][$i];
        $kategori_directory = strtolower($kategori);
        $gambar_path = "../uploads/$kategori_directory/" . $gambar;

        if (!is_dir("../uploads/$kategori_directory")) {
            mkdir("../uploads/$kategori_directory", 0777, true);
        }

        move_uploaded_file($gambar_temp, $gambar_path);

        
        $sql = "INSERT INTO rampcheck2 (id_fit, kategori, item, kondisi, gambar, keterangan) 
                    VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $connection->getConnection()->prepare($sql);
        $stmt->bind_param("ssssss", $id_fit, $kategori, $item, $kondisi, $gambar, $keterangan);
        $stmt->execute();
        $stmt->close();
    }

    $_SESSION['success_add'] = "Data Rampcheck berhasil ditambahkan!";
}

header("Location: ../views/rampcheck-add.php?id=$id_fit");
exit();
?>