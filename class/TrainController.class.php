<?php
/*if(!isset($_SESSION))
{
    session_start();
}*/
include_once "TrainModel.class.php";
include_once "VoyageController.class.php";
class TrainController extends TrainModel
{
    public function addTrain(Train $train){
        $this->ProcessValidation($train);
        $this->addTrainToDB($train);
    }
    public function updateTrainInfo($column,$data,int $id){
        //$this->ProcessValidation($train);
        $this->updateTrainInfoInDB($column,$data,$id);
    }
    public function deleteTrain($id){
        if(!is_numeric($id)){
            $_SESSION['train-crud-process']="Id of train to be deleted is is not valid !";
        }else{
            $this->deleteTrainFromDB($id);
        }
    }

    public function updateTrainStutus($id, $newStatus_id)
    {
       $this->updateTrainStutusInDB($id, $newStatus_id);
    }

    public function getAllTrains(){
        return $this->getAllTrainsFromDB();
    }

    public function getAllTrainsByStation($id_station){
        /*$date_depart = $voyage->getDatetime();
        $duree_voyage = $voyage->getDureeIstime();
        $frequence =$voyage->getFrequence();
        $dateObj = new DateTime();
        $dateObj->setTimezone(new DateTimeZone("Africa/Casablanca"));
        $interval = DateInterval::createFromDateString("$duree_voyage"." day");
        $trains = $this->getAllTrainsByStationInDB($voyage->getGareDepart());
        $VoyageCntrl = new VoyageController();
        $voyages = $VoyageCntrl->getVoyage();
        echo 'voyage count :'.count($voyages);
        echo 'voyage to reserve id :'.$voyage->getTrainID();
        foreach ($voyages as $v){
            if($v['id_train']==$voyage->getTrainID()){
                var_dump($v);
            }

        }

        var_dump($date_depart);
        var_dump($duree_voyage);
        var_dump($frequence);
        var_dump($dateObj);
        var_dump($interval);
        die;*/
        return $this->getAllTrainsFromDB();

    }

    public function ProcessValidation(Train $train){
        $checking = $this->verfyInputs($train);
        if(!$checking[0]){
            $_SESSION['train-crud-process']=$checking[1];
        }else{
            $_SESSION['train-crud-process']=$checking[1];
            exit();
        }
    }

    public function checkTrainAvailability(DateTime $date ,$train_id,DateTime $dateArrive,$frequence){
        $VoyageCntrl = new VoyageController();
        $voyages = $VoyageCntrl->getVoyage();
        foreach ($voyages as $v){
            //var_dump($v);
            // + condition que chaque train ne pas pas etre reserver au voyage plus que deux fois
             if($v['id_train']==$train_id){
                 if(($v['frequence']==1 && $frequence==1) || ($v['frequence']==2 && $frequence==1)){
                     $time_reserved_end_on = date("H:i:s",strtotime($v["date"]." +".$v['duree']." hours"));
                     $time_reserved_start_on = date("H:i:s",strtotime($v["date"]));
                     $time_to_reserve_start_on = date("H:i:s",$date->getTimestamp());
                     $time_to_reserve_end_on = date("H:i:s",$dateArrive->getTimestamp());

                    echo "time to reserve start in : ".$time_to_reserve_start_on." < time of trip start in :  ".$time_reserved_start_on."<br>";
                    echo "time to reserve end in : ".$time_to_reserve_end_on." < time of trip end in :  ".$time_reserved_end_on."<br>";

                     if(($time_to_reserve_start_on>$time_reserved_end_on && $time_to_reserve_end_on <$time_reserved_start_on) ||
                         $time_to_reserve_start_on<$time_reserved_start_on && $time_to_reserve_end_on< $time_reserved_start_on
                     ){
                        // echo "you could add trip :)";
                         echo "true";
                         return true ;
                     }else{
                        // echo "you could not add trip :(";
                         echo "false";
                         return false ;
                     }
                     /*echo $date->format("h:i:s");
                     if($v['date']<$date){
                         echo "yess";
                     }*/
                 }elseif ($v['frequence']==2 && $frequence==2){
                    if($date->getTimestamp() >strtotime($v['date']) || $date->getTimestamp()< strtotime($v['date'])){
                       /* $date_to_reserve_on = date('d/m/Y', $date->format('d/m/Y'));
                        $date_reserved_on = date('d/m/Y', $v['date']);*/

                        /*var_dump($date_reserved_on);
                        var_dump($date_to_reserve_on);*/
                       /* var_dump($date);
                        var_dump($date->getTimestamp());
                        var_dump($v['date']);
                        var_dump(strtotime($v['date']));
                        //echo $date->diff((DateTime::createFromFormat("Y-m-d",$v['date'])), true)->format('%Y years, %m months, %d days');
                        echo "you could add trip :)";*/
                        echo "true";
                        return true ;
                    }
                 }
             }
        }
        echo "true";
        return true ;
    }

    private function verfyInputs(Train $trainInfo):array{   // array contains validation boolean and message of validation

        if(empty($trainInfo->getNom())|| empty($trainInfo->getGareID()|| $trainInfo->getGareID())){
            return array(false,"all field should be filled !");
        }elseif (filter_var($trainInfo->getNom(),FILTER_SANITIZE_FULL_SPECIAL_CHARS) || !is_numeric($trainInfo->getCapacite()) || $trainInfo->getCapacite()<0){
            return array(false,"invalid data entered !");
        }
        return array(true,"");
    }


}