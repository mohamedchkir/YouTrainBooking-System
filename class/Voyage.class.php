<?php


class Voyage
{
 private $gareDepart;
 private $gareDistination;
 private $datetime;
 private $trainID;
 private $prixPourIndividu;
 private $dureeIstime;


    public function __construct($gareDepart, $gareDistination, $datetime, $trainID, $prixPourIndividu, $dureeIstime)
    {
        $this->gareDepart = $gareDepart;
        $this->gareDistination = $gareDistination;
        $this->datetime = $datetime;
        $this->trainID = $trainID;
        $this->prixPourIndividu = $prixPourIndividu;
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


    public function getDureeIstime()
    {
        return $this->dureeIstime;
    }


    public function setDureeIstime($dureeIstime)
    {
        $this->dureeIstime = $dureeIstime;
    }



}
