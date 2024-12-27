<?php

require_once(__DIR__ . '/../controllers/ThreadController.php');

header('Content-Type: application/json');

try {
    $threadController = new ThreadController();
    $threads = $threadController->getThreads();

    echo json_encode(['success' => true, 'data' => $threads]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}