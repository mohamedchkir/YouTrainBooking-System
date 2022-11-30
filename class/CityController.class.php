<?php
include_once("CityModel.class.php");

class CityController extends CityModel
{
 public function getCities()
 {
  return $this->getAllCities();
 }
}
