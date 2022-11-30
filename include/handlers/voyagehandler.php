<?php

include_once("../autoloader.php");
//include_once("../../class/CityController.class.php");
if (isset($_POST["suggestions"])) getSuggestions();










function getSuggestions()
{
 $sugg = $_POST["suggestions"];
 $city = new CityController();
 $cities = $city->getCities();
 print_r($cities);
 exit();
 foreach ($cities as $c) {
  if (strpos(strtolower($c), strtolower($sugg)) !== false) {
   echo $c . "<br>";
  }
 }
 //echo json_encode($cities);
}
