<?php

require_once(__DIR__ . '/../controllers/UserController.php');


if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];
    $twoFaEnabled = isset($_POST["2faCheckbox"]) ? 1 : 0;

    $signup = new UserController($username, $password, $email, $repeatPassword, $twoFaEnabled);
    $signup->signUpUser();
    header("location: /?error=none");
}