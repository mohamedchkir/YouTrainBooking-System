<?php
include_once ('DB.php');
class TrainModel extends DB
{
    protected function addTrainToDB(Train $train){
        $statement= $this->Connect()->prepare("INSERT INTO trains (nom,capacite,gare_id,status) VALUES (?,?,?,?);");
        if($statement->execute(array($train->getNom(),$train->getCapacite(),$train->getGareID(),$train->getStatusID()))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }
    }
    protected function updateTrainInfoInDB(Train $train,$id){
        $statement= $this->Connect()->prepare("UPDATE trains SET nom=? ,capacite=? ,gare_id=?,status=? WHERE id = ?;");
        if($statement->execute(array($train->getNom(),$train->getCapacite(),$train->getGareID(),$train->getStatusID(),$id))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }
    }
    protected function deleteTrainFromDB($id){
        $statement= $this->Connect()->prepare("DELETE FROM trains WHERE id = ?;");
        if($statement->execute(array($id))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }
    }
     protected function  getAllTrainsFromDB(){
        $statement= $this->Connect()->prepare("SELECT *  FROM trains ;");
        if($statement->execute(array($id))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }
        $trainsInDB = $statement->fetchAll();
        return $trainsInDB;
    }

    protected function getAllTrainsByStationInDB($id_station){
        $statement= $this->Connect()->prepare("SELECT *  FROM trains WHERE gare_id=?;");
        if($statement->execute(array($id_station))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }
        $trainsInDB = $statement->fetchAll();
        return $trainsInDB;
    }

    protected function updateTrainStutusInDB($id,$newStatus_id){
        $statement= $this->Connect()->prepare("UPDATE FROM trains SET status = ? WHERE id = ?;");
        if($statement->execute(array($newStatus_id,$id))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }

    }



}