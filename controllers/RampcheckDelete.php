<?php
session_start();
include '../database/Database.php';

$connection = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $id_ramp = $_GET['id_ramp'];
    $sql = "DELETE FROM rampcheck2 WHERE id_ramp = $id_ramp";
    
    if ($connection->getConnection()->query($sql) === TRUE) {
        $_SESSION['success_add'] = "Data Rampcheck berhasil dihapus!";
        header("Location: ../views/rampcheck-add.php?id=$id");
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $connection->getConnection()->error;
    }
}
?>