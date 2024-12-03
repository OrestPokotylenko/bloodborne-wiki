<?php

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];

    include "../dto/UserDTO.php";
    include "../models/UserModel.php";
    include "../controllers/UserController.php";

    $signup = new UserController($username, $password, $email, $repeatPassword);
    $signup->signUpUser();
    header("location: /?error=none");
}