<?php

require_once(__DIR__ . '/../models/BossModel.php');

class BossController {
    private $bossModel;

    public function __construct() {
        $this->bossModel = new BossModel();
    }

    public function getBosses() {
        return $this->bossModel->getBosses();
    }
}