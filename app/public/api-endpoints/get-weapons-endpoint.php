<?php

require_once(__DIR__ . '/../controllers/WeaponController.php');

header('Content-Type: application/json');

try {
    $weaponController = new WeaponController();
    $weapons = $weaponController->getWeapons();

    echo json_encode(['success' => true, 'data' => $weapons]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}