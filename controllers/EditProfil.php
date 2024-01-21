<?php
session_start();
include '../database/Database.php';

$connection = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id         = $_GET['id'];
    $full_name  = $_POST['full_name'];
    $username   = $_POST['username'];
    $email      = $_POST['email'];

    $sql = "UPDATE users SET
            full_name='$full_name',
            username='$username',
            email='$email'
            WHERE id=$id";

    if ($connection->getConnection()->query($sql) === TRUE) {
        $_SESSION['success_message'] = "Profil berhasil diperbarui.";
        header("Location: ../views/edit-profil.php");
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>