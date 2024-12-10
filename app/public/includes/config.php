<?php

require_once __DIR__ . '/../lib/env.php';

header('Content-Type: application/json');

// Access the environment variable
$googleApiKey = $_ENV['GOOGLE_API_KEY'];

// Return it as JSON
echo json_encode([
    'googleApiKey' => $googleApiKey,
]);