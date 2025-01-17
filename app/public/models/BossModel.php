<?php

require_once(__DIR__ . '/BaseModel.php');
require_once(__DIR__ . '/../dto/BossDTO.php');

class BossModel extends BaseModel
{
    public function getBosses()
    {
        $sql = "SELECT * FROM bosses";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $bossesData = $stmt->fetchAll();

        $bosses = [];
        foreach ($bossesData as $bossData) {
            $bossDTO = new BossDTO(
                $bossData['boss_id'],
                $bossData['name'],
                $bossData['location'],
                $bossData['health'],
                $bossData['blood_echoes'],
                $bossData['loot'],
                $bossData['physical_def'],
                $bossData['blunt_def'],
                $bossData['thrust_def'],
                $bossData['bolt_def'],
                $bossData['fire_def'],
                $bossData['blood_def'],
                $bossData['arcane_def'],
                $bossData['slow_poison_def'],
                $bossData['rapid_poison_def'],
                $bossData['affiliation'],
                $bossData['description'],
                $bossData['lore'],
                $bossData['img_path']
            );

            $bosses[] = $bossDTO;
        }

        return $bosses;
    }
}