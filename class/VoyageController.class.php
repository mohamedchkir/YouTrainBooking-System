<?php
// session_start();

include_once('VoyageModel.php');
include_once "TrainController.class.php";


class VoyageController extends VoyageModel
{

    
 public function getVoyage(){
    
    return $this->getAllVoyage();

 }


 public function get(){
    
    return $this->getAll();

 }

 public function ajouterUnVoyage(Voyage $voyage,$fr)
 {
    // do some verification
    //  if($voyage->setGareDepart($voyage->getGareDepart())==""){

    //  }
    
    // set Status call fun
    try{
        $train = new TrainController();
        $date=$voyage->getDatetime();
        $trainID=$voyage->getTrainID();
        //
        $d = new DateTime($date);
        // echo $d->format('m/Y/d H:i:s');

        // echo '<br>';
        //duree
        $time = date("H:i:s", strtotime($date."+".$voyage->getDureeIstime()." hours"));
        $t = new DateTime($time);
        // echo $t->format('H');
        // echo '<br>';
        $train->checkTrainAvailability($d,$trainID,$t,$fr);
        // die;

        $this->addVoyageInDB($voyage,$fr);
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

 

 public function getAvailableVoyage($gare_depart,$date_depart){
     
    $this->getAvailableVoyageInDb($gare_depart,$date_depart);
 }

 public function gatSearchVoyage($gare_depart,$date_depart){

    // $gare_depart = $_POST["id_ville_gare_depart"];
    // $date_depart = $_POST["date_depart"];
    
    $voyage = new VoyageController();
    $res = $voyage->getVoyage();
    //day == heurs
    $day_date = date("H:i:s",strtotime($date_depart));
    //week == day
    $week_date = date("D",strtotime($date_depart));
    //week == heurs
    $week_heurs = date("H:i:s",strtotime($date_depart));
    //week
    $week = date("y-m-d",strtotime($date_depart));
    //array resultat
    $data = array(); 

    foreach ($res as $r) {
        
        if($r['gare_depart'] == $gare_depart && $day_date < date("H:i:s",strtotime($r['date'])) && $r['frequence'] == 1){
            array_push($data,$r);
        }elseif($r['gare_depart'] == $gare_depart && $week_date == date("D",strtotime($r['date'])) && $r['frequence'] == 2 && $week_heurs < date("H:i:s",strtotime($r['date'])) && $week >= date("y-m-d",strtotime($r['date']))  ){
            array_push($data,$r);
        }
    }
    return $data; 
    }


    public function  checkCapacite($id_voyage,$dateReservation){
        return $this->capacite($id_voyage,$dateReservation);
    }

}




