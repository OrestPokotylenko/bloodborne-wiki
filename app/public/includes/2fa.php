<?php

require_once '../controllers/TwoFactorAuth.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user'])) {
    header("Location: /login");
    exit();
}

$twoFA = new TwoFactorAuth();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $inputCode = $_POST['code'];
    $storedCode = $_SESSION['2fa_code'];

    if ($twoFA->validateCode($inputCode)) {
        unset($_SESSION['2fa_code']);
        $_SESSION['isLoggedIn'] = true;
        header("Location: /");
        exit();
    }

    header("Location: /login");
}