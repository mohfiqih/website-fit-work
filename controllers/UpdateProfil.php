<?php
session_start();
include('../database/Database.php');

$connection = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id             = $_GET['id'];
    $full_name      = $_POST['full_name'];
    $username       = $_POST['username'];
    $email          = $_POST['email'];

    // File upload handling
    $gambar_files   = $_FILES['gambar'];
    $gambar_name    = $gambar_files['name'];
    $gambar_tmp     = $gambar_files['tmp_name'];
    $gambar_path    = '../uploads/profil/';
    
    move_uploaded_file($gambar_tmp, $gambar_path . $gambar_name);
    if ($gambar_files['error'] != 0) {
        $_SESSION['error_message'] = "Error uploading file: " . $gambar_files['error'];
        header("Location: ../views/update-profil.php");
        exit();
    }

    $sql = "UPDATE users SET
        full_name='$full_name',
        username='$username',
        email='$email',
        gambar='$gambar_name'
        WHERE id=$id";

    if ($connection->getConnection()->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Profil berhasil diperbarui.";
        header("Location: ../views/update-profil.php");
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>