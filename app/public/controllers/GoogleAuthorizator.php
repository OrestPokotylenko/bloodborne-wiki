<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Google\Client;

class GoogleAuthorizator
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setClientId($_ENV['GOOGLE_API_KEY']);
    }

    public function validateToken($token): ?array
    {
        $payload = $this->client->verifyIdToken($token);

        if ($payload) {
            return [
                'id' => $payload['sub'],
                'email' => $payload['email'],
                'name' => $payload['name'] ?? 'Google User'
            ];
        }

        return null;
    }
}