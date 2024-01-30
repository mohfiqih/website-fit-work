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
     
     $gambar_files = $_FILES['gambar'];
     $gambar_name = $gambar_files['name'];
     $gambar_tmp = $gambar_files['tmp_name'];
     $gambar_path = '../uploads/' . $gambar_name;

     move_uploaded_file($gambar_tmp, $gambar_path);

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

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $id_ramp    = $_POST['id_ramp'];
//     $id_fit     = $_POST['id_fit'];
//     $kategori   = $_POST['kategori'];
//     $item       = $_POST['item'];
//     $kondisi    = $_POST['kondisi'];
//     $keterangan = $_POST['keterangan'];
//     $gambar_files = $_FILES['gambar'];
    
//     for ($i = 0; $i < count($gambar_files['name']); $i++) {
//         $gambar = $gambar_files['name'][$i];
//         $gambar_temp = $gambar_files['tmp_name'][$i];
//         $kategori_directory = strtolower($kategori);
//         $gambar_path = "../uploads/$kategori_directory/" . $gambar;

//         if (!is_dir("../uploads/$kategori_directory")) {
//             mkdir("../uploads/$kategori_directory", 0777, true);
//         }

//         move_uploaded_file($gambar_temp, $gambar_path);

//         $sql = "UPDATE rampcheck2 SET (id_ramp, id_fit, kategori, item, kondisi, gambar, keterangan) 
//                     VALUES (?, ?, ?, ?, ?, ?, ?)";

//         $stmt = $connection->getConnection()->prepare($sql);
//         $stmt->bind_param("ssssss", $id_ramp, $id_fit, $kategori, $item, $kondisi, $gambar, $keterangan);
//         $stmt->execute();
//         $stmt->close();
//     }
//     header("Location: ../views/rampcheck-add.php?id=$id");
//     $_SESSION['success_update'] = "Data Rampcheck berhasil diupdate!";
//     exit();
// }

?>