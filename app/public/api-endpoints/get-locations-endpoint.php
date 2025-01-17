<?php

require_once(__DIR__ . '/../controllers/LocationController.php');

header('Content-Type: application/json');

try {
    $locationController = new LocationController();
    $locations = $locationController->getLocations();

    echo json_encode(['success' => true, 'data' => $locations]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}