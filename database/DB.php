<?php

class DB
{
    private $host = "localhost";
    private $db_name = "id19937654_youtrain";
    private $username = "id19937654_train";
    private $password = "7RSw-VG4mc-t7H4&";

    public function Connect(){
        $con = 'mysql:host='.$this->host.';dbname='.$this->db_name.';'; 
        $PDO = new PDO($con,$this->username,$this->password);
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC); 
        return $PDO;
    }
}
