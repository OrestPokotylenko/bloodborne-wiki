<?php

require_once __DIR__ . '/../controllers/TwoFactorAuth.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    include "../dto/UserDTO.php";
    include "../models/UserModel.php";
    include "../controllers/UserController.php";

    $login = new UserController($username, $password);
    $user = $login->getUser();

    $_SESSION['user'] = $user;

    if ($user->twoFA) {
        $twoFA = new TwoFactorAuth();
        $sent = $twoFA->send2FACode($_SESSION['user']->email);
        header("location: /two-factor-login");
        exit();
    }

    $_SESSION['isLoggedIn'] = true;
    header("location: /");
}
