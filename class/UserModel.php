<?php
include_once('DB.php');
session_start();

class UserModel extends DB
{
    
    protected function getAllUser(){
        $sql = "SELECT * from users";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }

}