<?php
include_once("DB.php");

class CityModel extends DB
{
 public function getAllCities()
 {
     $query = "SELECT * FROM villes";
     $statement = $this->Connect()->prepare($query);
     if (!$statement->execute()) {
         $statement = null;
         exit();
     }
     $rstOfExecution = $statement->fetchAll();
     if (!$rstOfExecution) {
         return [];
     }
     return $rstOfExecution;


 }
}
