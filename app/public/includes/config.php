<?php

require_once __DIR__ . '/../lib/env.php';

header('Content-Type: application/json');

$googleApiKey = $_ENV['GOOGLE_API_KEY'];

echo json_encode([
    'googleApiKey' => $googleApiKey,
]);