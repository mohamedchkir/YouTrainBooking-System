<?php

class TrainModel extends DB
{
    protected function addTrainToDB(Train $train){
        $statement= $this->Connect()->prepare("INSERT INTO trains (nom,capacite,gare_id) VALUES (?,?,?);");
        if($statement->execute(array($train->setNom(),$train->getCapacite(),$train->getGareID()))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }
    }
    protected function updateTrainInfoInDB(Train $train){
        $statement= $this->Connect()->prepare("UPDATE trains SET nom=? ,capacite=? ,gare_id=?;");
        if($statement->execute(array($train->setNom(),$train->getCapacite(),$train->getGareID()))){
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



}