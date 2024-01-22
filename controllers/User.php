<?php
require_once '../database/Database.php';

class User {
    private $connection;
    
    public function __construct() {
        $this->connection = new Database();
    }

    // ---------------- Memproses Login ----------------- //
    public function processLogin($username, $password) {
        if ($this->loginUser($username, $password)) {
            return true;
        }

        return false;
    }

    // ---------------- Get login dari tampilan ----------------- //
    public function loginUser($username, $password) {
        $username = $this->connection->escapeString($username);
        $password = $this->connection->escapeString($password);

        $hashedPassword = md5($password);

        $query = "SELECT * FROM users WHERE username='$username' AND password='$hashedPassword'";
        $result = $this->connection->getConnection()->query($query);

        if ($result->num_rows == 1) {
            return true;
        }
        
        return false;
    }

    // ---------------- GET data users (akses untuk menampilkan data user) ----------------- //
    public function getUserData() {
        $query = "SELECT id, full_name, username, email, password, timestamp, status FROM users";
        $result = $this->connection->getConnection()->query($query);
        
        if (!$result) {
            die("Error: " . $this->connection->getConnection()->error);
        }
        
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // ----------------  Get Profil ----------------- //
    public function getProfil($username) {
        $escapedUsername = $this->connection->escapeString($username);
        
        $query = "SELECT id, full_name, username, email, password, timestamp FROM users WHERE username = '$escapedUsername'";
        $result = $this->connection->getConnection()->query($query);
    
        if (!$result) {
            die("Error: " . $this->connection->getConnection()->error);
        }
    
        return $result->fetch_assoc();
    }
    

    // ----------------  POST Data User ----------------- //
    // public function addUser($full_name, $username, $email, $status, $password) {
    //     $full_name = $this->connection->escapeString($full_name);
    //     $username = $this->connection->escapeString($username);
    //     $email = $this->connection->escapeString($email);
    //     $status = $this->connection->escapeString($status);
    //     $existingUserQuery = "SELECT * FROM users WHERE username='$username'";
    //     $existingUserResult = $this->connection->getConnection()->query($existingUserQuery);
    
    //     if ($existingUserResult->num_rows > 0) {
    //         echo "<script>alert('Username \"$username\" sudah ada, buat username yang berbeda!.');</script>";
    //         return;
    //     }

    //     $hashedPassword = md5($password);
    
    //     $sql = "INSERT INTO users (full_name, username, email, status, password, timestamp) 
    //             VALUES ('$full_name', '$username', '$email', '$status', '$hashedPassword', NOW())";
    
    //     if ($this->connection->getConnection()->query($sql) === TRUE) {
    //         $_SESSION['data_users'] = [
    //             'full_name' => $full_name,
    //             'username'  => $username,
    //             'email'     => $email,
    //             'status'    => $status,
    //             'password'  => $hashedPassword,
    //         ];
    //         header("Location: ../views/data-users.php");
            
    //         exit();
    //     } else {
    //         echo "Error: " . $sql . "<br>" . $this->connection->getConnection()->error;
    //     }
    // }
    

    // public function updateUser($full_name, $username, $email) {
    //     $full_name = $this->connection->escapeString($full_name);
    //     $username = $this->connection->escapeString($username);
    //     $email = $this->connection->escapeString($email);
    
    //     $sql = "UPDATE users SET full_name='$full_name', email='$email' WHERE username='$username'";
    
    //     echo "SQL Query: $sql<br>";
    
    //     if ($this->connection->getConnection()->query($sql) === TRUE) {
    //         $_SESSION['data_users']['full_name'] = $full_name;
    //         $_SESSION['data_users']['email'] = $email;
    //         header("Location: ../views/data-users.php");
    //         exit();
    //     } else {
    //         return "Error updating user: " . $this->connection->getConnection()->error;
    //     }
    // }
    
}
?>