<?php

require_once(__DIR__ . '/../models/SubscriptionModel.php');
require_once(__DIR__ . '/../dto/SubscriptionDTO.php');

class SubscriptionController {
    private $subscriptionModel;

    public function __construct() {
        $this->subscriptionModel = new SubscriptionModel();
    }

    public function addSubscription($subscription) {
        $this->subscriptionModel->addSubscription($subscription);
    }
}