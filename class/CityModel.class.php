<?php
include_once("DB.php");

class CityModel extends DB
{
 public function getAllCities()
 {
     $query = "SELECT * FROM villes";
     try {
         $statement = $this->Connect()->prepare($query);
     }catch (PDOException $ex)
       {
            echo "error ".$ex->getMessage() ;
            $ex->
         exit();
        }
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
