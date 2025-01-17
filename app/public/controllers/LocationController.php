<?php

require_once(__DIR__ . '/../models/LocationModel.php');

class LocationController
{
    private $locationModel;

    public function __construct()
    {
        $this->locationModel = new LocationModel();
    }

    public function getLocations()
    {
        return $this->locationModel->getLocations();
    }
}