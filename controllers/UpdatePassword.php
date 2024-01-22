<?php
session_start();
include '../database/Database.php';

$connection = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id         = $_GET['id'];
    $full_name  = $_POST['full_name'];
    $username   = $_POST['username'];
    $email      = $_POST['email'];
    $password   = $_POST['password'];
    $hashPassword = md5($password);

    $sql = "UPDATE users SET
            full_name='$full_name',
            username='$username',
            email='$email',
            password='$hashPassword'
            WHERE id=$id";

    if ($connection->getConnection()->query($sql) === TRUE) {
        $_SESSION['success_password'] = "Password berhasil diperbarui.";
        header("Location: ../views/update-password.php");
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->error;
    }
}
?>