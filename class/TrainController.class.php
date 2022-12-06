<?php
session_start();
class TrainController extends TrainModel
{
    public function addTrain(Train $train){
        $this->ProcessValidation($train);
        $this->addTrainToDB($train);
    }
    public function updateTrainInfo(Train $train,int $id){
        $this->ProcessValidation($train);
        $this->updateTrainInfo($train,$id);
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

    public function getAllTrainsByStation($id){
        return $this->getAllTrainsByStationInDB($id);
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


    private function verfyInputs(Train $trainInfo):array{   // array contains validation boolean and message of validation

        if(empty($trainInfo->getNom())|| empty($trainInfo->getGareID()|| $trainInfo->getGareID())){
            return array(false,"all field should be filled !");
        }elseif (filter_var($trainInfo->getNom(),FILTER_SANITIZE_FULL_SPECIAL_CHARS) || !is_numeric($trainInfo->getCapacite()) || $trainInfo->getCapacite()<0){
            return array(false,"invalid data entered !");
        }
        return array(true,"");
    }


}