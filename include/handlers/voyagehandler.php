<?php

include_once("../autoloader.php");
//include_once("../../class/CityController.class.php");
if (isset($_POST["suggestions"])) getSuggestions();






function getSuggestions()
{
 $sugg = $_POST["suggestions"];
 //$city = new CityController();
 //$cities = $city->getCities();
 $cities = array("casa", "tanger", "tetouen", "castia", "rabat", "sale", "kenitra");
 $condition = true;

 foreach ($cities as $c) {
  if (empty($sugg)) {
   $condition = true;
  } else {
   $condition = strpos(strtolower($c), strtolower($sugg)) !== false;
  }
  if ($condition) {
   echo "<input type='button' class='btn w-100 border-bottom' onclick='putValue(this)'  value='$c'>";
  }
 }
 //echo json_encode($cities);
}
