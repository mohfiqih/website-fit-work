<?php

require_once '../models/LoginModel.php';

class LoginController {
    private $loginModel;

    public function __construct() {
        $this->loginModel = new LoginModel();
    }

    public function processLogin($username, $password) {
        if ($this->loginModel->loginUser($username, $password)) {
            return true;
        }

        return false;
    }
}
?>