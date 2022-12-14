<?php

include_once('DB.php');

if (!isset($_SESSION)) {
    session_start();
}

class GareModel extends DB
{

    protected function getAllgareFromDB()
    {

        $sql = "SELECT * from gares";
        $sql = "SELECT gares.*, villes.nom as nameVille FROM gares INNER JOIN villes on gares.id_Ville=villes.id";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

    protected function addGareInDB(gare $gare)
    {
        $sql = "INSERT INTO `gares`(`nom`, `id_Ville`) VALUES (?,?)";
        $resultat = $this->connect()->prepare($sql);
        try {
            $resultat->execute(array($gare->getGareName(), $gare->getVilleID()));
            $_SESSION['message'] = "gare has been added successfully";
        } catch (PDOException $er) {
            $_SESSION['error'] = "gare has been not added";
            $error = $er->getMessage();
        }
        return $error;
    }


    protected function editGareInDB(gare $gare, $id)
    {
        $gareName = $gare->getGareName();
        $id_Ville = $gare->getVilleID();
        try {
            $sql = "UPDATE `gares` SET `nom`=?,`id_Ville`=? WHERE id =$id";
            $resultat = $this->connect()->prepare($sql);
            $resultat->execute(array($gareName, $id_Ville));
            $_SESSION['message'] = "gare has been update successfully";
        } catch (PDOException $er) {
            $_SESSION['error'] = "gare has been not update";
            $error = $er->getMessage();
        }
        return $error;
    }

    protected function deleteGareInDB($id)
    {
        try {
            $sql = "DELETE FROM `gares` WHERE id=$id";
            $resultat = $this->connect()->prepare($sql);
            $resultat->execute();
            $_SESSION['message'] = "Gare has been delete successfully";
        } catch (PDOException $er) {
            $_SESSION['error'] = "Gare has been not delete";
            $error = $er->getMessage();
        }
        return $error;
    }
}
