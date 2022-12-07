<?php

include_once ('../autoloader.php');
if(isset($_POST['save-train'])) saveTrain();





function saveTrain()
{
    $nom_train = $_POST['nom_train'];
    $id_gare = $_POST['id_gare'];
    $status = $_POST['status'];
    $capacite = $_POST['capacite'];


    $newTrain = new Train($nom_train,$capacite,$id_gare,$status);
    $trainCtr = new TrainController();
    $trainCtr->addTrain($newTrain);
}