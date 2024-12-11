<?php
header('Content-Type: application/json');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

echo json_encode(['loggedIn' => isset($_SESSION['email'])]);