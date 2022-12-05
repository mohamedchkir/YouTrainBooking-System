<?php

include_once('VoyageModel.php');
// include_once('../include/handlers/voyagehandler.php');

class VoyageController extends VoyageModel
{
 public function getVoyage(){
    
    return $this->getAllVoyage();
 }

 public function ajouterUnVoyage(Voyage $voyage)
 {
     // do some verification
    //  if($voyage->setGareDepart($voyage->getGareDepart())==""){

    //  }
    $this->addVoyageInDB($voyage);
    // set Status call fun
        
 }
 public function updateVoyageInfo(Voyage $voyage)
 {
    
     // do some verification
 }
 public function supprimerUnVoyage($id)
 {
     // do some verification
 }
 public function getAvailableTrains($gareDepart, $gareDistination, $datetime): array
 {
     // do some verification
     $cityCntr = new CityController();
     $cities = $cityCntr->getAllCities();
     $inCities =false;
     foreach ($cities as  $city){
        if(in_array($gareDepart,$city) || !in_array($gareDistination,$city)){

        }
     }

     // ask model to get data
     $this->getAvailableTrainsFromDB($gareDepart,$gareDistination,$datetime);





     return array();
    //  return array(new Voyage("Tanger","Tetouen",new DateTime(),2,99.99,"2H30min"));
 }

 
}

