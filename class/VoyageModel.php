<?php

include_once('DB.php');


class VoyageModel extends DB
{
    protected function getAvailableTrainsFromDB($gareDepart, $gareDistination, $datetime)
    {

       $statement= $this->Connect()->prepare("SELECT * FROM voyages where ");
    }

    protected function getAll(){
        $sql = "SELECT * from voyages";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    protected function getAllVoyage(){
        $sql = "SELECT v.*,s.nom as statusnom ,g.nom as garedepart, ga.nom as garearrivee,t.nom as train from voyages as v INNER JOIN status as s on v.status = s.id
        INNER JOIN gares as g on v.gare_depart=g.id 
        INNER join  gares as ga on v.gare_arrivee=ga.id
        INNER JOIN trains as t on v.id_train=t.id where v.disabled is null";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    protected function addVoyageInDB(Voyage $voyage,$fr){
        try {
            $sql = "INSERT INTO `voyages`(`status`, `duree`, `gare_depart`, `gare_arrivee`, `prix`, `id_train`, `date`,`unique_id`,`Frequence`) VALUES (?,?,?,?,?,?,?,?,?)";
            $resultat =$this->connect()->prepare($sql);
            $resultat->execute(array($voyage->getStatut(),$voyage->getDureeIstime(),$voyage->getGareDepart(),$voyage->getGareDistination(),$voyage->getPrixPourIndividu(),$voyage->getTrainID(),$voyage->getDatetime(),$voyage->getUniqueIdForBothAllerRotour(),$fr));
        }catch (PDOException $er){
            echo $er->getMessage();
        }
    }


    protected function editVoyageInDB(Voyage $voyage,$id){
        try{
            $status = $voyage->getStatut();
            $duree = $voyage->getDureeIstime();
            $gare_depart = $voyage->getGareDepart();
            $gare_arrivee = $voyage->getGareDistination();
            $prix = $voyage->getPrixPourIndividu();
            $id_train = $voyage->getTrainID();
            $date = $voyage->getDatetime();
            $sql="UPDATE `voyages` SET `status`=?,`duree`=?,`gare_depart`=?,`gare_arrivee`=?,`prix`=?,`id_train`=?,`date`=? WHERE id =$id";
            $resultat =$this->connect()->prepare($sql);
            $resultat->execute(array($status,$duree,$gare_depart,$gare_arrivee,$prix,$id_train,$date));
        }catch (PDOException $er){
            echo $er->getMessage();
        }
    }

    protected function deleteVoyageInDB($id){
        try{
            $sql=" UPDATE `voyages` SET `disabled`=? WHERE unique_id=?";
            $resultat =$this->connect()->prepare($sql);
            $resultat->execute(array(0,$id));
        }catch (PDOException $er){
            echo $er->getMessage();
        }
    }

    protected function getAvailableVoyageInDb($gare_depart,$date_depart){
        try{
            $sql="SELECT * FROM `voyage` WHERE gare_depart=? and date=?";
            $resultat = $this->Connect()->prepare($sql);
            $resultat->execute(array($gare_depart,$date_depart));
            $resultat->fetchAll();
            return $resultat;
        }catch (PDOException $er){
            echo $er->getMessage();
        }
    }


    public function capacite($id_voyage,$dateReservation){
        try{
            $sql="SELECT sum(quantity) as capacity  FROM `reservations` WHERE id_voyage=? and dateReservation =?";
            $resultat = $this->Connect()->prepare($sql);
            $resultat->execute(array($id_voyage,$dateReservation));
            $r = $resultat->fetchColumn();
            return $r;
        }catch (PDOException $er){
            echo $er->getMessage();
        }
    }


    
}


