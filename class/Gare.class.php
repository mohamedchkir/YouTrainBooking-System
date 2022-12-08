<?php

class Gare
{
    private string $gareName;
    private int $villeID;
    public function __construct($gareName, $villeID)
    {
        $this->gareName = $gareName;
        $this->villeID = $villeID;
    }


    public function getGareName(): string
    {
        return $this->gareName;
    }

    public function setGareName($gareName): void
    {
        $this->gareName = $gareName;
    }

    public function getVilleID(): int
    {
        return $this->villeID;
    }

    public function setVilleID($villeID): void
    {
        $this->villeID = $villeID;
    }
}
