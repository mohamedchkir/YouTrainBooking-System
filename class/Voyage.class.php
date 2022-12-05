<?php


class Voyage
{
    
    private $gareDepart;
    private $datetime;
    private $gareDistination;
    private $trainID;
    private $prixPourIndividu;
    private $dureeIstime;
    private $statut;
    private $uniqueIdForBothAllerRotour;
    private int $frequence;

 public function __construct($statut,$dureeIstime,$gareDepart, $gareDistination,$prixPourIndividu, $trainID,$datetime,$uniqueIdForBothAllerRotour)
 {
  $this->statut = $statut;
  $this->dureeIstime = $dureeIstime;
  $this->gareDepart = $gareDepart;
  $this->gareDistination = $gareDistination;
  $this->prixPourIndividu = $prixPourIndividu;
  $this->trainID = $trainID;
  $this->datetime = $datetime;
  $this->uniqueIdForBothAllerRotour = $uniqueIdForBothAllerRotour;

 }


    public function getStatut()
    {
        return $this->statut;
    }


    public function setStatut($statut)
    {
        $this->statut = $statut;
    }

    public function getDureeIstime()
    {
        return $this->dureeIstime;
    }


    public function setDureeIstime($dureeIstime)
    {
        $this->dureeIstime = $dureeIstime;
    }

    public function getGareDepart()
    {
        return $this->gareDepart;
    }


    public function setGareDepart($gareDepart)
    {
        $this->gareDepart = $gareDepart;
    }


    public function getGareDistination()
    {
        return $this->gareDistination;
    }


    public function setGareDistination($gareDistination)
    {
        $this->gareDistination = $gareDistination;
    }

    public function getDatetime()
    {
        return $this->datetime;
    }


    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;
    }


    public function getTrainID()
    {
        return $this->trainID;
    }

    public function setTrainID($trainID)
    {
        $this->trainID = $trainID;
    }


    public function getPrixPourIndividu()
    {
        return $this->prixPourIndividu;
    }

    public function setPrixPourIndividu($prixPourIndividu)
    {
        $this->prixPourIndividu = $prixPourIndividu;
    }



    public function getUniqueIdForBothAllerRotour(){
        return $this->uniqueIdForBothAllerRotour;
    }

    public function setUniqueIdForBothAllerRotour($id){
        $this->uniqueIdForBothAllerRotour=$id;
    }


    

}
