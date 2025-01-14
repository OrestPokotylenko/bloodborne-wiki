<?php

require_once(__DIR__ . '/../dto/SubscriptionDTO.php');
require_once(__DIR__ . '/../controllers/SubscriptionController.php');

header('Content-Type: application/json');

try {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $data = json_decode(file_get_contents('php://input'), true);
    $email = $data['email'];

    if (!$email) {
        echo json_encode(['success' => false, 'message' => 'email cannot be empty']);
        exit();
    }
    
    $subscriptionController = new SubscriptionController();
    $subscription = new SubscriptionDTO($email, true);
    $subscriptionController->addSubscription($subscription);

    echo json_encode(['success' => true]);
} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
}