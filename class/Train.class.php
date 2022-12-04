<?php

class Train
{
    private string $nom ;
    private int $capacite;
    private int $gareActuel;


    /**
     * @param string $nom
     * @param int $capacite
     * @param int $gareActuel
     */
    public function __construct(string $nom, int $capacite, int $gareActuel)
    {
        $this->nom = $nom;
        $this->capacite = $capacite;
        $this->gareActuel = $gareActuel;
    }

    public function getGareActuel(): int
    {
        return $this->gareActuel;
    }

    public function setGareActuel(int $gareActuel): void
    {
        $this->gareActuel = $gareActuel;
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