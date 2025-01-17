<?php

class LocationDTO {
    public readonly int $locationId;
    public readonly string $name;
    public readonly ?string $after;
    public readonly ?string $leadsTo;
    public readonly string $description;
    public readonly string $bosses;
    public readonly string $imgPath;

    public function __construct(int $locationId, string $name, ?string $after, ?string $leadsTo, string $description, string $bosses, string $imgPath) {
        $this->locationId = $locationId;
        $this->name = $name;
        $this->after = $after;
        $this->leadsTo = $leadsTo;
        $this->description = $description;
        $this->bosses = $bosses;
        $this->imgPath = $imgPath;
    }
}