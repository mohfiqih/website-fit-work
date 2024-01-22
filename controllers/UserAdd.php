<?php
session_start();
include('../database/Database.php');

$connection = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $status = $_POST['status'];
    $password = $_POST['password'];
    $hashedPassword = md5($password);

    
    $sql = "INSERT INTO users (full_name, username, email, status, password, timestamp) 
            VALUES ('$full_name', '$username', '$email', '$status', '$hashedPassword', NOW())";

     if ($connection->getConnection()->query($sql) === TRUE) {
          $_SESSION['success_add_user'] = "Data user berhasil ditambahkan!";
          header("Location: ../views/user-data.php");
     } else {
          $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->error;
     }
}
?>