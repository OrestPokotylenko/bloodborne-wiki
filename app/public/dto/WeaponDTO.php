<?php

class WeaponDTO {
    public readonly int $weaponId;
    public readonly string $name;
    public readonly ?string $physicalAtk;
    public readonly ?string $bloodAtk;
    public readonly ?string $arcaneAtk;
    public readonly ?string $fireAtk;
    public readonly ?string $boltAtk;
    public readonly ?int $bulletUse;
    public readonly int $durability;
    public readonly int $slowPoison;
    public readonly int $rapidPoison;
    public readonly int $atkVsKin;
    public readonly int $atkVsBeasts;
    public readonly ?int $strengthReq;
    public readonly ?int $skillReq;
    public readonly ?int $bloodtingeReq;
    public readonly ?int $arcaneReq;
    public readonly string $weaponType;
    public readonly string $transform;
    public readonly string $found;
    public readonly string $imgPath;

    public function __construct(int $weaponId, string $name, ?string $physicalAtk, ?string $bloodAtk, ?string $arcaneAtk, ?string $fireAtk, ?string $boltAtk, ?int $bulletUse, int $durability, int $slowPoison, int $rapidPoison, int $atkVsKin, int $atkVsBeasts, ?int $strengthReq, ?int $skillReq, ?int $bloodtingeReq, ?int $arcaneReq, string $weaponType, string $transform, string $found, string $imgPath)
    {
        $this->weaponId = $weaponId;
        $this->name = $name;
        $this->physicalAtk = $physicalAtk;
        $this->bloodAtk = $bloodAtk;
        $this->arcaneAtk = $arcaneAtk;
        $this->fireAtk = $fireAtk;
        $this->boltAtk = $boltAtk;
        $this->bulletUse = $bulletUse;
        $this->durability = $durability;
        $this->slowPoison = $slowPoison;
        $this->rapidPoison = $rapidPoison;
        $this->atkVsKin = $atkVsKin;
        $this->atkVsBeasts = $atkVsBeasts;
        $this->strengthReq = $strengthReq;
        $this->skillReq = $skillReq;
        $this->bloodtingeReq = $bloodtingeReq;
        $this->arcaneReq = $arcaneReq;
        $this->weaponType = $weaponType;
        $this->transform = $transform;
        $this->found = $found;
        $this->imgPath = $imgPath;
    }
}