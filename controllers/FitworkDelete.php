<?php
session_start();
include '../database/Database.php';

$connection = new Database();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus terlebih dahulu dari rampcheck2
    $deleteRampcheck2Sql = "DELETE FROM rampcheck2 WHERE id_fit = $id";

    if ($connection->getConnection()->query($deleteRampcheck2Sql) === TRUE) {
        // Setelah berhasil menghapus dari rampcheck2, baru hapus dari fit_work
        $deleteFitWorkSql = "DELETE FROM fit_work WHERE id = $id";

        if ($connection->getConnection()->query($deleteFitWorkSql) === TRUE) {
            $_SESSION['success_add_user'] = "Data fit work berhasil dihapus!";
            header("Location: ../views/fit-work.php");
        } else {
            $_SESSION['error_message'] = "Error deleting from fit_work: " . $deleteFitWorkSql . "<br>" . $connection->getConnection()->error;
        }
    } else {
        $_SESSION['error_message'] = "Error deleting from rampcheck2: " . $deleteRampcheck2Sql . "<br>" . $connection->getConnection()->error;
    }
}

?>