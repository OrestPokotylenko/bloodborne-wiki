<?php

require_once(__DIR__ . '/BaseModel.php');
require_once(__DIR__ . '/../dto/SubscriptionDTO.php');

class SubscriptionModel extends BaseModel {
    private function alreadySubscribed($email): bool {
        $stmt = $this->pdo->prepare('SELECT * FROM subscriptions WHERE email = ?');
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result !== false;
    } 

    public function addSubscription($subscription) {
        if (!$this->alreadySubscribed($subscription->email)) {
            $stmt = $this->pdo->prepare('INSERT INTO subscriptions (email, subscribed) VALUES (?, ?)');
            $stmt->execute([$subscription->email, $subscription->subscribed]);
        }
    }
}