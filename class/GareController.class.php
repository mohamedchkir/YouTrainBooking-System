<?php

include_once('GareModel.php');


class GareController extends GareModel
{
    function getAllGare()
    {
        return $this->getAllgareFromDB();
    }


    public function ajouterGare(Gare $gare)
    {
        $this->addGareInDB($gare);
    }


    public function editGare(Gare $gare, $id)
    {
        $this->editGareInDB($gare, $id);
    }


    public function supprimerGare($id)
    {
        $this->deleteGareInDB($id);
    }
}
