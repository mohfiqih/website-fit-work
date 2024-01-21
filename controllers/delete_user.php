<?php
include('../database/Database.php');

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $connection = new Database();
    $userId = $this->connection->escapeString($userId);
    $sql = "DELETE FROM users WHERE id='$userId'";

    if ($this->connection->getConnection()->query($sql) === TRUE) {
         return true;
    } else {
         return "Error deleting user: " . $this->connection->getConnection()->error;
    }
} else {
    echo "Invalid request";
}
?>