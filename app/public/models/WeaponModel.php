<?php

require_once(__DIR__ . '/BaseModel.php');
require_once(__DIR__ . '/../dto/WeaponDTO.php');

class WeaponModel extends BaseModel {
    public function getWeapons() {
        $sql = "SELECT * FROM weapons";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $weaponsData = $stmt->fetchAll();
    
        $weapons = [];
        foreach ($weaponsData as $weaponData) {
            $weaponDTO = new WeaponDTO(
                $weaponData['weapon_id'],
                $weaponData['name'],
                $weaponData['physical_atk'],
                $weaponData['blood_atk'],
                $weaponData['arcane_atk'],
                $weaponData['fire_atk'],
                $weaponData['bolt_atk'],
                $weaponData['bullet_use'],
                $weaponData['durability'],
                $weaponData['slow_poison'],
                $weaponData['rapid_poison'],
                $weaponData['atk_vs_kin'],
                $weaponData['atk_vs_beasts'],
                $weaponData['strength_req'],
                $weaponData['skill_req'],
                $weaponData['bloodtingle_req'],
                $weaponData['arcane_req'],
                $weaponData['weapon_type'],
                $weaponData['transform'],
                $weaponData['found'],
                $weaponData['img_path']
            );

            $weapons[] = $weaponDTO;
        }
    
        return $weapons;
    }
}