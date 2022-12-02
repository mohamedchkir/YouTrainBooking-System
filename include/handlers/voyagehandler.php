<?php

include_once("../autoloader.php");
//include_once("../../class/CityController.class.php");
if (isset($_POST["suggestions"])) getSuggestions();
if (isset($_POST["search"])) getAvailableTrips();






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
   echo "<input type='button' class='btn w-100 border-bottom' onclick='putValue(this)'  value='" . $c["ville"] . "'>";
  }
 }
 //echo json_encode($cities);
}


function getAvailableTrips()
{
    $gare_depart = $_POST["gare_depart"];
    $gare_distination = $_POST["gare_distination"];
    $date_depart = $_POST["date_depart"];
    $voyageCtr = new VoyageController();


    $available = $voyageCtr->getAvailableTrains($gare_depart,$gare_distination,$date_depart);
    echo "<pre>";
    print_r($available);
    echo "</pre>";
    echo "<pre>";
    echo $gare_depart."    ".$gare_distination."      ".$date_depart;
    echo "</pre>";
    exit();
}
