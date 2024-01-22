<?php
session_start();
include '../database/Database.php';

$connection = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";

    if ($connection->getConnection()->query($sql) === TRUE) {
        $_SESSION['success_add_user'] = "Data user berhasil dihapus!";
        header("Location: ../views/user-data.php");
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->getConnection()->error;
    }
}
?>