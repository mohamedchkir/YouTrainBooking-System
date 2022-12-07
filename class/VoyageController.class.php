<?php
session_start();

include_once('VoyageModel.php');



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
    
    // set Status call fun
    try{
        $this->addVoyageInDB($voyage);
        $_SESSION['message']="Voyage has been added successfully";
    }catch(PDOException $er){
        $_SESSION['error']="Voyage has been not added";
    }
        
 }
 public function updateVoyageInfo(Voyage $voyage,$id)
 {
    
     // do some verification
    try{
        $this->editVoyageInDB($voyage,$id);
        $_SESSION['message']="Voyage has been update successfully";
    }catch(PDOException $er){
        $_SESSION['error']="Voyage has been not update";
    }
 }
 public function supprimerUnVoyage($id)
 {
     // do some verification
     

    try{
        $this->deleteVoyageInDB($id);
        $_SESSION['message']="Voyage has been delete successfully";
    }catch(PDOException $er){
        $_SESSION['error']="Voyage has been not delete";
    }
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

