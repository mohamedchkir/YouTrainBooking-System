<?php

include_once('DB.php');
session_start();

class VoyageModel extends DB
{
    protected function getAvailableTrainsFromDB($gareDepart, $gareDistination, $datetime)
    {

       $statement= $this->Connect()->prepare("SELECT * FROM voyages where ");
    }

    protected function getAllVoyage(){
        $sql = "SELECT * from voyages";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    protected function addVoyageInDB(Voyage $voyage){
        $sql = "INSERT INTO `voyages`(`status`, `duree`, `gare_depart`, `gare_arrivee`, `prix`, `id_train`, `date`,`unique_id`) VALUES (?,?,?,?,?,?,?,?)";
        $resultat =$this->connect()->prepare($sql);
        try {
            $resultat->execute(array($voyage->getStatut(),$voyage->getDureeIstime(),$voyage->getGareDepart(),$voyage->getGareDistination(),$voyage->getPrixPourIndividu(),$voyage->getTrainID(),$voyage->getDatetime(),$voyage->getUniqueIdForBothAllerRotour()));
            $_SESSION['message']="Voyage has been added successfully";
        }catch (PDOException $er){
            $_SESSION['error']="Voyage has been not added";
            $error = $er->getMessage();
            echo $er->getMessage();
        }
        return $error;
    }


    protected function editVoyageInDB(Voyage $voyage,$id){
        $status = $voyage->getStatut();
        $duree = $voyage->getDureeIstime();
        $gare_depart = $voyage->getGareDepart();
        $gare_arrivee = $voyage->getGareDistination();
        $prix = $voyage->getPrixPourIndividu();
        $id_train = $voyage->getTrainID();
        $date = $voyage->getDatetime();
        try{
            $sql="UPDATE `voyages` SET `status`=?,`duree`=?,`gare_depart`=?,`gare_arrivee`=?,`prix`=?,`id_train`=?,`date`=? WHERE id =$id";
            $resultat =$this->connect()->prepare($sql);
            $resultat->execute(array($status,$duree,$gare_depart,$gare_arrivee,$prix,$id_train,$date));
            $_SESSION['message']="Voyage has been update successfully";
        }catch (PDOException $er){
            $_SESSION['error']="Voyage has been not update";
            $error = $er->getMessage();
            echo $er->getMessage();
        }
        return $error;
    }

    protected function deleteVoyageInDB($id){
        try{
            $sql="DELETE FROM `voyages` WHERE id=$id";
            $resultat =$this->connect()->prepare($sql);
            $resultat->execute();
            $_SESSION['message']="Voyage has been delete successfully";
        }catch (PDOException $er){
            $_SESSION['error']="Voyage has been not delete";
            $error = $er->getMessage();
            echo $er->getMessage();
        }
        return $error;
    }
}


