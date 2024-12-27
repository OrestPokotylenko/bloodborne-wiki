<?php

require_once(__DIR__ . '/../controllers/ThreadController.php');

header('Content-Type: application/json');

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $data = json_decode(file_get_contents('php://input'), true);
    $title = $data['title'];

    if (!$title) {
        echo json_encode(['success' => false, 'message' => 'values cannot be empty']);
        exit();
    }

    $threadController = new ThreadController();
    $threadController->addThread($_SESSION['user']->userId, $title);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}
