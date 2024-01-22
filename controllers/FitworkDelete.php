<?php
session_start();
include '../database/Database.php';

$connection = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM fit_work WHERE id = $id";

    if ($connection->getConnection()->query($sql) === TRUE) {
        $_SESSION['success_add_user'] = "Data fit work berhasil dihapus!";
        header("Location: ../views/fit-work.php");
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->getConnection()->error;
    }
}
?>