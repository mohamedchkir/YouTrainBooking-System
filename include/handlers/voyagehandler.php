<?php


include_once("../autoloader.php");


//include_once("../../class/CityController.class.php");
if (isset($_POST["suggestions"]) && isset($_POST['whatToGet'])) getSuggestions();
if (isset($_POST["search"])) getAvailableTrips();
if (isset($_POST["search_again"])) getAvailableTrips();

if (isset($_POST["search"])) getAvailableTrips();
if (isset($_POST["saveVoyage"])) saveVoyage();
if (isset($_POST["editVoyage"])) editVoyage();
if (isset($_POST["deleteVoyage"])) deleteVoyage();


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

    $statut = Validation($_POST['status']);
    $duree = Validation($_POST['duree']);
    $gare_depart = Validation($_POST['id_gare_arrivee']);
    $gare_arrivee = Validation($_POST['id_gare_arrivee']);
    $prix = Validation($_POST['prix']);
    $id_train = Validation($_POST['id_train']);
    $date=Validation($_POST['datetime']);
    $unique= uniqid();

    // var_dump($statut,$duree,$gare_depart,$gare_arrivee,$prix,$id_train,$date,$unique);
    //     die;

    
    $voyage = new VoyageController();
    //aller
    $voyage->ajouterUnVoyage(new Voyage($statut,$duree,$gare_depart,$gare_arrivee,$prix,$id_train,$date,$unique));
    //roteur
    $voyage->ajouterUnVoyage(new Voyage($statut,$duree,$gare_arrivee,$gare_depart,$prix,$id_train,$date,$unique));

    echo "<script>window.location.replace('../../voyage/index.php')</script>";

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

        // var_dump($statut,$duree,$gare_depart,$gare_arrivee,$prix,$id_train,$date,$unique);
        // die;

        $voyage = new VoyageController();

        $voyage->updateVoyageInfo(new Voyage($statut,$duree,$gare_depart,$gare_arrivee,$prix,$id_train,$date,$unique),$id);
        echo "<script>window.location.replace('../../voyage/index.php')</script>";
    }
}


function deleteVoyage(){
    $id = Validation($_POST['md_id_tr']);

    $voyage = new VoyageController();
    $voyage->supprimerUnVoyage($id);
    echo "<script>window.location.replace('../../voyage/index.php')</script>";
}
