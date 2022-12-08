<?php


include_once("../autoloader.php");

session_start();
//include_once("../../class/CityController.class.php");
if (isset($_POST["suggestions"])) getSuggestions();
if (isset($_POST["search"])) getAvailableTrips();
if (isset($_POST["search_again"])) getAvailableTrips();

if (isset($_POST["search"])) getAvailableTrips();
if (isset($_POST["saveVoyage"])) saveVoyage();
if (isset($_POST["editVoyage"])) editVoyage();
if (isset($_GET["id"])) deleteVoyage();





function getSuggestions()
{
 $sugg = $_POST["suggestions"];
 $city = new CityController();
 $cities = $city->getCities();
 // foreach ($cities as $city) {
 //  print_r($city["ville"]);
 // }

 // exit();
 //$cities = array("casa", "tanger", "tetouen", "castia", "rabat", "sale", "kenitra");
 $condition = true;

 foreach ($cities as $c) {
  if (empty($sugg)) {
   $condition = true;
  } else {
   $condition = strpos(strtolower($c['ville']), strtolower($sugg)) !== false;
  }
  if ($condition) {
   echo "<input type='button' class='btn w-100 border-bottom' onclick='putValue(this)' ville_id='".$c['id']."' value='" . $c["ville"] . "'>";
  }
 }
 //echo json_encode($cities);
}


function getAvailableTrips()
{
    $gare_depart = $_POST["gare_depart"];
    $gare_distination = $_POST["gare_distination"];
    $date_depart = $_POST["date_depart"];
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

    $statut = $_POST['status'];
    $duree = $_POST['duree'];
    $gare_depart = $_POST['id_gare_arrivee'];
    $gare_arrivee = $_POST['id_gare_arrivee'];
    $prix = $_POST['prix'];
    $id_train = $_POST['id_train'];
    $date=$_POST['datetime'];
    $unique= uniqid();

    // $UniqueIdForBothAllerRotour,$gareDepart, $gareDistination, $datetime, $trainID, $prixPourIndividu, $dureeIstime)
    $voyage = new VoyageController();
    //aller
    $voyage->ajouterUnVoyage(new Voyage($statut,$duree,$gare_depart,$gare_arrivee,$prix,$id_train,$date,$unique));
    //roteur
    $voyage->ajouterUnVoyage(new Voyage($statut,$duree,$gare_arrivee,$gare_depart,$prix,$id_train,$date,$unique));

    echo "<script>window.location.replace('../../voyage/index.php')</script>";

}


function editVoyage(){
    if(isset($_POST['md_id_tr'])){
        $id = $_POST['md_id_tr'];
        $statut = $_POST['status'];
        $duree = $_POST['duree'];
        $gare_depart = $_POST['gare_depart'];
        $gare_arrivee = $_POST['gare_arrivee'];
        $prix = $_POST['prix'];
        $id_train = $_POST['id_train'];
        $date = $_POST['datetime'];
        $unique = $_POST['md_unique_id'];

        $voyage = new VoyageController();

        $voyage->updateVoyageInfo(new Voyage($statut,$duree,$gare_depart,$gare_arrivee,$prix,$id_train,$date,$unique),$id);
        echo "<script>window.location.replace('../../voyage/index.php')</script>";
    }
}


function deleteVoyage(){
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $voyage = new VoyageController();

        $voyage->supprimerUnVoyage($id);
        echo "<script>window.location.replace('../../voyage/index.php')</script>";
    }
}
