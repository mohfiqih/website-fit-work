<?php
session_start();
include('../database/Database.php');

$connection = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id             = $_GET['id'];
    $full_name      = $_POST['full_name'];
    $username       = $_POST['username'];
    $email          = $_POST['email'];
    $status          = $_POST['status'];

    $sql = "UPDATE users SET full_name='$full_name', username='$username', email='$email', status='$status'
            WHERE id=$id";

     if ($connection->getConnection()->query($sql) === TRUE) {
          $_SESSION['success_add_user'] = "Data berhasil diupdate!";
          header("Location: ../views/user-data.php");
     } else {
          $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->error;
     }
}
?>