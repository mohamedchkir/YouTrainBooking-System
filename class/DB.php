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

     try {

        $con = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name . ';';
        $PDO = new PDO($con, $this->username, $this->password);
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $PDO->setAttribute(PDO::ERRMODE_EXCEPTION,PDO::ERRMODE_EXCEPTION);
        //throw new PDOException("Something goes wrong ");
        return $PDO;
    }
    catch (PDOException $ex)
    {
        return $ex;
    }

 }
}
