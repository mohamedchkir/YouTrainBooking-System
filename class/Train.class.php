<?php

class Train
{
    private string $nom ;
    private int $capacite;
    private int $gare_ID;
    private int $status_ID;


    public function __construct(string $nom, int $capacite, int $gare_ID, int $status_ID)
    {
        $this->nom = $nom;
        $this->capacite = $capacite;
        $this->gare_ID = $gare_ID;
        $this->status_ID = $status_ID;
    }


    public function getStatusID(): int
    {
        return $this->status_ID;
    }

    public function setStatusID(int $status_ID): void
    {
        $this->status_ID = $status_ID;
    }


    public function getGareID(): int
    {
        return $this->gare_ID;
    }

    public function setGareID(int $gare_ID): void
    {
        $this->gare_ID = $gare_ID;
    }
    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getCapacite(): int
    {
        return $this->capacite;
    }

    public function setCapacite(int $capacite): void
    {
        $this->capacite = $capacite;
    }





}