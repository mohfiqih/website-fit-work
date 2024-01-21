<?php

require_once 'User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $loginController = new User();

    if ($loginController->processLogin($username, $password)) {
     session_start();
     $_SESSION['username'] = $username;
     header("Location: ../views/dasbor.php");
     exit();
 } else {
     session_start();
     $_SESSION['login_error'] = 'Login gagal. Periksa kembali username dan password.';
     header("Location: ../index.php");
     exit();
 }
}
?>