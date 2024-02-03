<?php
require_once '../database/Database.php';

class User {
    private $connection;
    
    public function __construct() {
        $this->connection = new Database();
    }

    // ---------------- Memproses Login ----------------- //
    public function processLogin($username, $password) {
        if ($this->loginUser($username, $password) && $this->checkUserStatus($username)) {
            return true;
        }
    
        return false;
    }

    public function checkUserStatus($username) {
        $escapedUsername = $this->connection->escapeString($username);
    
        $query = "SELECT status FROM users WHERE username = '$escapedUsername'";
        $result = $this->connection->getConnection()->query($query);
    
        if ($result) {
            $userData = $result->fetch_assoc();
            return $userData['status'] === 'Active';
        }
    
        return false;
    }

    // ---------------- Get login dari tampilan ----------------- //
    public function loginUser($username, $password) {
        $username = $this->connection->escapeString($username);
        $password = $this->connection->escapeString($password);
    
        $hashedPassword = md5($password);
    
        // Add the "status" condition to the query
        $query = "SELECT * FROM users WHERE username='$username' AND password='$hashedPassword' AND status='Active'";
        $result = $this->connection->getConnection()->query($query);
    
        if ($result->num_rows == 1) {
            return true;
        }
        
        return false;
    }
    

    // ---------------- GET data users (akses untuk menampilkan data user) ----------------- //
    public function getUserData() {
        $query = "SELECT id, full_name, username, email, password, timestamp, status, gambar FROM users";
        $result = $this->connection->getConnection()->query($query);
        
        if (!$result) {
            die("Error: " . $this->connection->getConnection()->error);
        }
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // ----------------  Get Profil ----------------- //
    public function getProfil($username) {
        $escapedUsername = $this->connection->escapeString($username);
        
        $query = "SELECT id, full_name, username, email, password, gambar, timestamp FROM users WHERE username = '$escapedUsername'";
        $result = $this->connection->getConnection()->query($query);
    
        if (!$result) {
            die("Error: " . $this->connection->getConnection()->error);
        }
    
        return $result->fetch_assoc();
    }
}
?>