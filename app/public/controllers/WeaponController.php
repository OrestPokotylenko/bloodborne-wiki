<?php

require_once(__DIR__ . '/../models/WeaponModel.php');

class WeaponController {
    private $weaponModel;

    public function __construct() {
        $this->weaponModel = new WeaponModel();
    }

    public function getWeapons() {
        return $this->weaponModel->getWeapons();
    }
}