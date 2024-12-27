<?php

require_once __DIR__ . '/../controllers/ReplyController.php';

header('Content-Type: application/json');

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $data = json_decode(file_get_contents('php://input'), true);
    $threadId = $data['threadId'];
    $content = $data['content'];
    $parentReplyId = $data['parentReplyId'];

    if (!$threadId || !$content) {
        echo json_encode(['success' => false, 'message' => 'values cannot be empty']);
        exit();
    }

    $replyController = new ReplyController();
    $replyController->addReply($threadId, $_SESSION['user']->userId, $content, $parentReplyId);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}