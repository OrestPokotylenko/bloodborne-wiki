<?php

require_once __DIR__ . '/../models/UserModel.php';

class UserController
{
    private $email;
    private $username;
    private $password;
    private $repeatPassword;
    private $userModel;

    public function __construct($username, $password, $email = null, $repeatPassword = null)
    {
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
        $this->repeatPassword = $repeatPassword;

        $this->userModel = new UserModel();
    }

    public function signUpUser() {
        if ($this->emptySignUpValidation() == false) {
            header("location: /login?error=emptyinput");
            exit();
        }

        if ($this->usernameValidation() == false) {
            header("location: /login?error=invalidusername");
            exit();
        }

        if ($this->emailValidation() == false) {
            header("location: /login?error=invalidemail");
            exit();
        }

        if ($this->passwordMatch() == false) {
            header("location: /login?error=nopasswordmatch");
            exit();
        }

        if ($this->checkUser() == false) {
            header("location: /login?error=userexists");
            exit();
        }

        $this->userModel->setUser($this->email, $this->username, $this->password);
    }

    public function getUser() {
        if ($this->emptyLoginValidation() == false) {
            header("location: /login?error=emptyinput");
            exit();
        }

        $this->userModel->getUser($this->username, $this->password);
    }

    private function emptyLoginValidation(): bool {
        if (empty($this->username) || empty($this->password)) {
            return false;
        }

        return true;
    }

    private function emptySignUpValidation(): bool
    {
        if (empty($this->email) || empty($this->username) || empty($this->password) || empty($this->repeatPassword)) {
            return false;
        }

        return true;
    }

    private function usernameValidation(): bool {
        if (!preg_match("/^[a-zA-Z0-9]*$/", $this->username)) {
            return false;
        }

        return true;
    }

    private function emailValidation(): bool {
        if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            return false;
        }

        return true;
    }

    private function passwordMatch(): bool
    {
        if ($this->password !== $this->repeatPassword) {
            return false;
        }

        return true;
    }

    private function checkUser(): bool
    {
        if (!$this->userModel->checkUser($this->email, $this->username)) {
            return false;
        }

        return true;
    }
}