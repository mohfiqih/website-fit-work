<?php

require_once '../database/Database.php';

class LoginModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function loginUser($username, $password) {
        $username = $this->db->escapeString($username);
        $password = $this->db->escapeString($password);

        $hashedPassword = md5($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password='$hashedPassword'";
        $result = $this->db->getConnection()->query($query);

        if ($result->num_rows == 1) {
            return true;
        }

        return false;
    }
}
?>