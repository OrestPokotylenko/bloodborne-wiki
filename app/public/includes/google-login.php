<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../controllers/UserController.php';
require_once __DIR__ . '/../models/UserModel.php';
require_once __DIR__ . '/../dto/UserDTO.php';

use Google\Client;

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

    $client = new Client(['client_id' => getenv('GOOGLE_API_KEY')]); // Replace with your Client ID
    $payload = $client->verifyIdToken($data['credential']);

    if ($payload) {
        $googleId = $payload['sub'];
        $email = $payload['email'];
        $name = $payload['name'] ?? 'Google User';

        $userController = new UserController(null, null);
        $user = $userController->handleGoogleLogin($googleId, $email, $name);

        // Set session variables
        $_SESSION['userid'] = $user->userId;
        $_SESSION['username'] = $user->username;
        $_SESSION['email'] = $user->email;

        echo json_encode(['success' => true]);
    } else {
        throw new Exception('Invalid ID token');
    }
} catch (Exception $e) {
    http_response_code(401);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}