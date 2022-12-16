<?php

include_once ('../autoloader.php');
if(isset($_POST['save-train'])) saveTrain();
if(isset($_POST['column']) && isset($_POST['data'])) updateTrainInfo();
if(isset($_POST['deleteTranById'])) deleteTrain();





function saveTrain()
{
    $nom_train = $_POST['nom_train'];
    $id_gare = $_POST['id_gare'];
    $status = $_POST['status'];
    $capacite = $_POST['capacite'];

    //echo "<script>alert('".$id_gare."')</script>";

    $newTrain = new Train($nom_train,intval($capacite),intval($id_gare),intval($status));
    $trainCtr = new TrainController();
    $trainCtr->addTrain($newTrain);
    header("location:../../dash/index.php?page=train");
}


function updateTrainInfo()
{
    $column = $_POST['column'];
    $data =$_POST['data'];
    $id = $_POST['id'];
    $trainCntr = new TrainController();
    $trainCntr->updateTrainInfo($column,$data,$id);
    echo "Train updated sucessfuly :)";
    
}

function deleteTrain()
{
    $id = $_POST['deleteTranById'];
    $tranCtr = new TrainController();
    $tranCtr->deleteTrain($id);
    echo "Train deleted sucessfuly :)";
}