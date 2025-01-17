<?php

require_once(__DIR__ . '/../controllers/UserController.php');
require_once(__DIR__ . '/../controllers/ForgotPasswordController.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];

    $userController = new UserController('', '', $email);

    if ($userController->checkUser() == true) {
        header("Location: /login?error=usernotfound");
        exit();
    }

    $forgotPasswordController = new ForgotPasswordController();
    $forgotPasswordController->sendResetEmail($email);

    header("Location: /login");
    exit();
}