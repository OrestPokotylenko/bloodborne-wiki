<?php

class BossDTO {
    public readonly int $bossId;
    public readonly string $name;
    public readonly string $location;
    public readonly int $health;
    public readonly int $bloodEchoes;
    public readonly string $loot;
    public readonly int $physicalDefence;
    public readonly int $bluntDefence;
    public readonly int $thrustDefence;
    public readonly int $boltDefence;
    public readonly int $fireDefence;
    public readonly int $bloodDefence;
    public readonly int $arcaneDefence;
    public readonly int $slowPoisonDefence;
    public readonly int $rapidPoisonDefence;
    public readonly string $affiliation;
    public readonly string $description;
    public readonly string $lore;
    public readonly string $imgPath;

    public function __construct(int $bossId, string $name, string $location, int $health, int $bloodEchoes, string $loot, int $physicalDefence, int $bluntDefence, int $thrustDefence, int $boltDefence, int $fireDefence, int $bloodDefence, int $arcaneDefence, int $slowPoisonDefence, int $rapidPoisonDefence, string $affiliation, string $description, string $lore, string $imgPath)
    {
        $this->bossId = $bossId;
        $this->name = $name;
        $this->location = $location;
        $this->health = $health;
        $this->bloodEchoes = $bloodEchoes;
        $this->loot = $loot;
        $this->physicalDefence = $physicalDefence;
        $this->bluntDefence = $bluntDefence;
        $this->thrustDefence = $thrustDefence;
        $this->boltDefence = $boltDefence;
        $this->fireDefence = $fireDefence;
        $this->bloodDefence = $bloodDefence;
        $this->arcaneDefence = $arcaneDefence;
        $this->slowPoisonDefence = $slowPoisonDefence;
        $this->rapidPoisonDefence = $rapidPoisonDefence;
        $this->affiliation = $affiliation;
        $this->description = $description;
        $this->lore = $lore;
        $this->imgPath = $imgPath;
    }
}