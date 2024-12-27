<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if (isset($data['timezone'])) {
        $_SESSION['timezone'] = $data['timezone'];

        echo json_encode(['success' => true, 'timezone' => $_SESSION['timezone']]);
    } else {
        http_response_code(400);
        echo json_encode(['success' => false, 'message' => 'Timezone not provided']);
    }
} else {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}