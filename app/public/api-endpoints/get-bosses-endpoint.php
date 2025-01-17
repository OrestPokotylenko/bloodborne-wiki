<?php

require_once(__DIR__ . '/../controllers/BossController.php');

header('Content-Type: application/json');

try {
    $bossController = new BossController();
    $bosses = $bossController->getBosses();

    echo json_encode(['success' => true, 'data' => $bosses]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}