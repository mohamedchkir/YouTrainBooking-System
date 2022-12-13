<?php
if(!isset($_SESSION))
{
    session_start();
}

include_once("../autoloader.php");


//include_once("../../class/CityController.class.php");
if (isset($_POST["suggestions"]) && isset($_POST['whatToGet'])) getSuggestions();
if (isset($_POST["search"])) getAvailableTrips();
if (isset($_POST["search_again"])) getAvailableTrips();

if (isset($_POST["search"])) getAvailableTrips();
if (isset($_POST["saveVoyage"])) saveVoyage();
if (isset($_POST["editVoyage"])) editVoyage();
if (isset($_POST["deleteVoyage"])) deleteVoyage();
if (isset($_POST["isTrainAvailable"])) checkTrainAvailability();


//function validation input 
function Validation($input){
    //Supprime les espaces debut et fin 
    $input = trim($input);
    //Supprimer quote string (\n \t \)
    $input = stripcslashes($input);
    //Convertit les balise html en string
    $input = htmlspecialchars($input);
    //Supprime les espaces center
    $input = preg_replace('/\s+/',' ', $input);
    return $input;
}


function getSuggestions()
{
 $sugg = $_POST["suggestions"];
 $whatToGet =$_POST['whatToGet'];


 $variantToget=array();
 if($whatToGet=="villes"){
     $cityContr = new CityController();
     $variantToget= $cityContr->getAllCities();
 }elseif ($whatToGet=="gares"){
     $gareContr = new GareController();
     $variantToget = $gareContr->getAllGare();
 }
 $condition = true;

 foreach ($variantToget as $c) {
  if (empty($sugg)) {
   $condition = true;
  } else {
          $condition = strpos(strtolower($c['nom']), strtolower($sugg)) !== false;
  }
  if ($condition) {
   echo "<input type='button' class='btn w-100 border-bottom' onclick='putValue(this)' ville_id='".$c['id']."' value='" . $c["nom"] . "'>";
  }
 }
 //echo json_encode($cities);
}


function getAvailableTrips()
{
    // $gare_depart = $_POST["id_ville_gare_depart"];
    // $date_depart = $_POST["date_depart"];
    
    // $voyage = new VoyageController();
    // $res = $voyage->get();
    // //day == heurs
    // $day_date = date("H:i:s",strtotime($date_depart));
    // //week == day
    // $week_date = date("D",strtotime($date_depart));
    // //week == heurs
    // $week_heurs = date("H:i:s",strtotime($date_depart));
    // //array resultat
    // $data = array(); 
    // foreach ($res as $r) {
    //     if($r['gare_depart'] == $gare_depart && $day_date < date("H:i:s",strtotime($r['date'])) && $r['frequence'] == 1){
    //         array_push($data,$r);
    //         return $data;
    //         echo "<script>window.location.replace('../../booking/index.php')</script>";
    //     }elseif($r['gare_depart'] == $gare_depart && $week_date == date("D",strtotime($r['date'])) && $r['frequence'] == 2 && $week_heurs < date("H:i:s",strtotime($r['date']))){
    //         array_push($data,$r);
    //         return $data;
    //         echo "<script>window.location.replace('../../booking/index.php')</script>";
    //     }else{
    //         echo "<script>window.location.replace('../../index.php')</script>";
    //     }
    // }

    $date_depart = $_POST["id_ville_gare_depart"];
    $gare_depart = $_POST["gare_depart"];
    $gare_distination = $_POST["gare_distination"];
    if(isset($_POST["date_retour"])){
        $date_retour =$_POST["date_retour"];
        $date_retour_formed = (empty($date_retour)? "Non indiqué" : date('d M Y h:i', strtotime($date_retour)));
    }else{
        $date_retour_formed="Non Indiqué";
    }
    $gare_distination = empty($gare_distination) ? "Distination non indiqué": $gare_distination;
    $voyageCtr = new VoyageController();


    $available = $voyageCtr->getAvailableTrains($gare_depart,$gare_distination,$date_depart);
    echo "<pre>";
    print_r($available);
    echo "</pre>";
    echo "<pre>";
    echo $gare_depart."    ".$gare_distination."      ".$date_depart;
    echo "</pre>";
    $date = strtotime($date_depart);
    $_SESSION['search-info']= array("gare_depart"=>$gare_depart,"gare_distination"=>$gare_distination,"date_depart"=>$date_depart,"date_formed"=>date('d M Y h:i', $date),"date_retour"=>$date_retour_formed);
    echo "<script>setTimeout(function (){window.location.replace('../../booking')},3000)</script>";
}


function saveVoyage(){

    $statut = Validation($_POST['status']);
    $duree = Validation($_POST['duree']);
    $gare_depart = Validation($_POST['id_gare_depart']);
    $gare_arrivee = Validation($_POST['id_gare_arrivee']);
    $prix = Validation($_POST['prix']);
    $id_train = Validation($_POST['id_train']);
    $date=Validation($_POST['datetime']);
    $unique= uniqid();
    $fr= $_POST['Frequence'];
    
    if(empty($statut) && empty($duree) && empty($gare_depart) && empty($gare_arrivee) && empty($prix) && empty($id_train) && empty($date) && empty($unique)){
        // var_dump($duree);

        $_SESSION['error']="All is required !!!";
    echo "<script>window.location.replace('../../dash/index.php?page=voyage')</script>";

    }else{
        $voyage = new VoyageController();
    //aller
    $voyage->ajouterUnVoyage(new Voyage($statut,$duree,$gare_depart,$gare_arrivee,$prix,$id_train,$date,$unique),$fr);
    //roteur
    $voyage->ajouterUnVoyage(new Voyage($statut,$duree,$gare_arrivee,$gare_depart,$prix,$id_train,$date,$unique),$fr);

    echo "<script>window.location.replace('../../dash/index.php?page=voyage')</script>";
    }
    
    

}


function editVoyage(){
    if(isset($_POST['md_id_tr'])){
        $id = Validation($_POST['md_id_tr']);
        $statut = Validation($_POST['md_status']);
        $duree = Validation($_POST['md_duree']);
        $gare_depart = Validation($_POST['md_gare_depart']);
        $gare_arrivee = Validation($_POST['md_gare_arrivee']);
        $prix = Validation($_POST['md_prix']);
        $id_train = Validation($_POST['md_id_train']);
        $date = Validation($_POST['md_datetime']);
        $unique = Validation($_POST['md_unique_id']);
        $voyage = new VoyageController();

        $voyage->updateVoyageInfo(new Voyage($statut,$duree,$gare_depart,$gare_arrivee,$prix,$id_train,$date,$unique),$id);
        echo "<script>window.location.replace('../../dash/index.php?page=voyage')</script>";
    }
}


function deleteVoyage(){
    $id = Validation($_POST['md_id_tr']);
    $voyage = new VoyageController();
    $voyage->supprimerUnVoyage($id);
    echo "<script>window.location.replace('../../dash/index.php?page=voyage')</script>";
}


function checkTrainAvailability(){
    $trainCtr = new TrainController();
    $date=$_POST['datetime'];
    $train=$_POST['trainId'];
    $duree=$_POST['duree'];
    $Frequence=$_POST['Frequence'];


    $d = new DateTime($date);
    //echo $d->format('m/Y/d H:i:s');
    $time = date("H:i:s", strtotime($date."+".$duree." hours"));
    $t = new DateTime($time);

    echo $trainCtr->checkTrainAvailability($d,$train,$t,$Frequence);  
      
}