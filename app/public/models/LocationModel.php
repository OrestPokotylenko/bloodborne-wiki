<?php

require_once(__DIR__ . '/BaseModel.php');
require_once(__DIR__ . '/../dto/LocationDTO.php');

class LocationModel extends BaseModel {
    public function getLocations() {
        $sql = "SELECT * FROM locations";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $locationsData = $stmt->fetchAll();

        $locations = [];
        foreach ($locationsData as $locationData) {
            $locationDTO = new LocationDTO(
                $locationData['location_id'],
                $locationData['name'],
                $locationData['after'],
                $locationData['leads_to'],
                $locationData['description'],
                $locationData['bosses'],
                $locationData['img_path']
            );

            $locations[] = $locationDTO;
        }

        return $locations;
    }
}