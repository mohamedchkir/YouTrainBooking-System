<?php

class Gare
{
    private string $gareName;
    private int $status;
    private int $villeID;
    public function __construct($gareName, $status, $villeID)
    {
        $this->gareName = $gareName;
        $this->status = $status;
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


    public function getStatus(): int
    {
        return $this->status;
    }

    public function setStatus($status): void
    {
        $this->status = $status;
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
