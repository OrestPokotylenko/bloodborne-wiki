<?php

require_once(__DIR__ . '/../controllers/UserController.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];

    if ($password !== $repeatPassword) {
        header("Location: /reset-password?error=passwordsdontmatch");
        exit();
    }

    $userController = new UserController(null, $password, $_SESSION['reset_email'], $repeatPassword);
    $userController->resetPassword();

    header("Location: /login");
}