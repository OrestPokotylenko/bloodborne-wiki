<?php

require_once(__DIR__ . '/BaseModel.php');
require_once(__DIR__ . '/../dto/UserDTO.php');

class UserModel extends BaseModel
{
    public function checkUser($email, $username): bool {
        $stmt = $this->pdo->prepare('SELECT username FROM users WHERE username = ? OR email = ?;');

        if (!$stmt->execute(array($email, $username))) {
            $stmt = null;
            header("location: /?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() > 0) {
            return false;
        }

        return true;
    }

    public function setUser($email, $username, $password) {
        $stmt = $this->pdo->prepare('INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?);');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = 'user';

        if (!$stmt->execute([$username, $email, $hashedPassword, $role])) {
            $stmt = null;
            header("location: /?error=stmtfailed");
            exit();
        }

        $stmt = null;
    }

    public function getUser($username, $password) {
        $stmt = $this->pdo->prepare('SELECT password FROM users WHERE username = ? OR email = ?;');

        if (!$stmt->execute(array($username, $username))) {
            $stmt = null;
            header("location: /?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: /?error=usernotfound");
            exit();
        }

        $passwordHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPassword = password_verify($password, $passwordHashed[0]["password"]);

        if ($checkPassword == false) {
            $stmt = null;
            header("location: /?error=wrongpaswword");
            exit();
        }

        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE username = ? OR email = ? AND password = ?;');

        if (!$stmt->execute(array($username, $username, $passwordHashed[0]["password"]))) {
            $stmt = null;
            header("location: /?error=stmtfailed");
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header("location: /?error=usernotfound");
            exit();
        }

        $fetchedData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $user = new UserDTO($fetchedData[0]["user_id"], $fetchedData[0]["username"], $fetchedData[0]["email"], $fetchedData[0]["role"]);

        session_start();
        $_SESSION["userid"] = $user->userId;
        $_SESSION["username"] = $user->username;
        $_SESSION["email"] = $user->email;

        $stmt = null;
    }

    public function getUserByGoogleIdOrEmail($googleId, $email)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE google_id = ? OR email = ?;');
        $stmt->execute([$googleId, $email]);
        $userData = $stmt->fetch();

        if ($userData) {
            return new UserDTO($userData["user_id"], $userData["username"], $userData["email"], $userData["role"]);
        }

        return null;
    }

    public function createUserWithGoogle($username, $email, $googleId)
    {
        $stmt = $this->pdo->prepare('INSERT INTO users (username, email, google_id, role) VALUES (?, ?, ?, ?);');
        $role = 'user';

        $stmt->execute([$username, $email, $googleId, $role]);
    }
}