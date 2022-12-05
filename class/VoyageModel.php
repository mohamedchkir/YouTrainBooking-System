<?php

include_once('DB.php');

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
        $msg="" ;
        $sql = "INSERT INTO `voyages`(`status`, `duree`, `gare_depart`, `gare_arrivee`, `prix`, `id_train`, `date`,`unique_id`) VALUES (?,?,?,?,?,?,?,?)";
        $resultat =$this->connect()->prepare($sql);
        try {
            echo $voyage->getDatetime() ;
            die;
            $resultat->execute(array($voyage->getStatut(),$voyage->getDureeIstime(),$voyage->getGareDepart(),$voyage->getGareDistination(),$voyage->getPrixPourIndividu(),$voyage->getTrainID(),$voyage->getDatetime(),$voyage->getUniqueIdForBothAllerRotour()));
            $msg = "success";
        }catch (PDOException $e){
            $msg = $e->getMessage();
            echo $e->getMessage();
        }
        return $msg;
    }


    protected function editVoyageInDB(Voyage $voyage,$id){
        $status = $voyage->getStatut();
        $duree = $voyage->getDureeIstime();
        $gare_depart = $voyage->getGareDepart();
        $gare_arrivee = $voyage->getGareDistination();
        $prix = $voyage->getPrixPourIndividu();
        $id_train = $voyage->getTrainID();
        $date = $voyage->getDatetime();

        // echo $date;
        // die;
        
        $sql="UPDATE `voyages` SET `status`=$status,`duree`=$duree,`gare_depart`=$gare_depart,`gare_arrivee`=$gare_arrivee,`prix`=$prix,`id_train`=$id_train,`date`=$date WHERE id =$id";
        $resultat =$this->connect()->prepare($sql);
        $resultat->execute();
    }

    protected function deleteVoyageInDB($id){
        $sql="DELETE FROM `voyages` WHERE id=$id";
        $resultat =$this->connect()->prepare($sql);
        $resultat->execute();
    }
}


