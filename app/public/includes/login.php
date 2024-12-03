<?php

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    include "../dto/UserDTO.php";
    include "../models/UserModel.php";
    include "../controllers/UserController.php";

    $login = new UserController($username, $password);
    $login->getUser();
    header("location: /?error=none");
}