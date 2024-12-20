<?php

require_once __DIR__ . "/../controllers/ReplyController.php";

header('Content-Type: application/json');

if (isset($_GET['threadId'])) {
    try {
        $threadId = (int)$_GET['threadId'];
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $data = json_decode(file_get_contents('php://input'), true);
    
        $replyController = new ReplyController();
    
        $replies = $replyController->getReplies($threadId);
        echo json_encode(['success' => true, 'data' => $replies]);
    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }
}
