<?php
include_once ('DB.php');
class TrainModel extends DB
{
    protected function addTrainToDB(Train $train){
        //var_dump($train->getGareID());
        $statement= $this->Connect()->prepare("INSERT INTO trains (nom,capacite,id_gare,status) VALUES (?,?,?,?);");
        if(!$statement->execute(array($train->getNom(),$train->getCapacite(),$train->getGareID(),$train->getStatusID()))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }
    }
    protected function updateTrainInfoInDB($column,$data,$id){
        $statement= $this->Connect()->prepare("UPDATE trains SET $column=? WHERE id = ?;");
        if(!$statement->execute(array($data,$id))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }
    }
    protected function deleteTrainFromDB($id){
        $statement= $this->Connect()->prepare("DELETE FROM trains WHERE id = ?;");
        if(!$statement->execute(array($id))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }
    }
     protected function  getAllTrainsFromDB(){
        $statement= $this->Connect()->prepare("SELECT tr.* ,status.nom as status,gareTable.nom as gare  FROM trains as tr INNER JOIN status as status on tr.status = status.id INNER JOIN gares as gareTable on tr.id_gare = gareTable.id");
        if(!$statement->execute()){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }
        $trainsInDB = $statement->fetchAll();
        return $trainsInDB;
    }

    protected function getAllTrainsByStationInDB($id_station){
        $statement= $this->Connect()->prepare("SELECT *  FROM trains WHERE id_gare=:username;");
        $statement->bindParam(':username',$id_station);
        $statement->execute();
        /*if(!$statement->execute(array($id_station))){
             var_dump($statement);
             var_dump($id_station);
             die();
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }*/
        $trainsInDB = $statement->fetchAll();
        return $trainsInDB;
    }

    protected function updateTrainStutusInDB($id,$newStatus_id){
        $statement= $this->Connect()->prepare("UPDATE FROM trains SET status = ? WHERE id = ?;");
        if(!$statement->execute(array($newStatus_id,$id))){
            header("location:../index.php?errStatement=notExecuted;");
            exit();
        }

    }

    public function capaciteTrain($idTrain){
        try{
            $sql="SELECT capacite from trains WHERE id =?";
            $resultat = $this->Connect()->prepare($sql);
            $resultat->execute(array($idTrain));
            $r = $resultat->fetchColumn();
            return $r;
        }catch (PDOException $er){
            echo $er->getMessage();
        }
    }

}