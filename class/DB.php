<?php

class DB
{

 // private $host = "sql108.epizy.com";
 // private $db_name = "epiz_33104775_YouTrain";
 // private $username = "epiz_33104775";
 // private $password = "CPcVETRiPhWat";
 private $host = "localhost";
 private $db_name = "YouTrain";
 private $username = "root";
 private $password = "";

 protected function Connect()
 {
  $con = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';';
  $PDO = new PDO($con, $this->username, $this->password);
  $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
  return $PDO;
 }
}