<?php

require_once(__DIR__ . '/BaseModel.php');
require_once(__DIR__ . '/../dto/UserDTO.php');

class UserModel extends BaseModel
{
    public function checkUser($email, $username): bool {
        if (empty($email) || empty($username)) {
            header("location: /?error=emptyfields");
            exit();
        }
    
        $stmt = $this->pdo->prepare('SELECT username FROM users WHERE email = ? OR username = ?;');
    
        if (!$stmt->execute([$email, $username])) {
            error_log("Database error: " . implode(", ", $stmt->errorInfo()));
            $stmt = null;
            header("location: /?error=stmtfailed");
            exit();
        }
    
        $userExists = $stmt->rowCount() > 0;
        $stmt = null;
    
        return !$userExists; // Returns true if no user is found
    }

    public function setUser($email, $username, $password, $twoFA) {
        $stmt = $this->pdo->prepare('INSERT INTO users (username, email, password, role, twoFA) VALUES (?, ?, ?, ?, ?);');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $role = 'user';

        if (!$stmt->execute([$username, $email, $hashedPassword, $role, $twoFA])) {
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
        $stmt = null;

        return new UserDTO($fetchedData[0]["user_id"], $fetchedData[0]["username"], $fetchedData[0]["email"], $fetchedData[0]["role"], $fetchedData[0]["twoFA"]);
    }

    public function getUserByGoogleIdOrEmail($googleId, $email)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE google_id = ? OR email = ?;');
        $stmt->execute([$googleId, $email]);
        $userData = $stmt->fetch();

        if ($userData) {
            return new UserDTO($userData["user_id"], $userData["username"], $userData["email"], $userData["role"], $userData["twoFA"], $userData["google_id"]);
        }

        return null;
    }

    public function createUserWithGoogle($username, $email, $googleId, $twoFA = false)
    {
        $stmt = $this->pdo->prepare('INSERT INTO users (username, email, google_id, role, twoFA) VALUES (?, ?, ?, ?, ?);');
        $role = 'user';

        $stmt->execute([$username, $email, $googleId, $role, $twoFA]);
    }

    public function resetPassword($email, $password) {
        $stmt = $this->pdo->prepare('UPDATE users SET password = ? WHERE email = ?;');
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt->execute([$hashedPassword, $email]);
    }
}