<?php

require_once __DIR__ . '/../controllers/GoogleAuthorizator.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../dto/UserDTO.php';

header('Content-Type: application/json');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

try {
    $postData = file_get_contents('php://input');
    $data = json_decode($postData, true);

    if (!isset($data['credential'])) {
        throw new Exception('Credential not found');
    }

    $googleAuthorizator = new GoogleAuthorizator();
    $payload = $googleAuthorizator->validateToken($data['credential']);

    if (!$payload) {
        throw new Exception('Invalid ID token');
    }

    $googleId = $payload['id'];
    $email = $payload['email'];
    $name = $payload['name'];

    $userController = new UserController(null, null);
    $user = $userController->handleGoogleLogin($googleId, $email, $name);

    $_SESSION['userid'] = $user->userId;
    $_SESSION['username'] = $user->username;
    $_SESSION['email'] = $user->email;

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}