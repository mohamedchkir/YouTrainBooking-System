<?php

include_once("DB.php");

class LoginModel extends DB{

    public function getUser($email,$password){
        
        $query = "SELECT * FROM users WHERE email = ?;";
        $statement = $this->connect()->prepare($query);
   
       
        if(!$statement->execute(array($email))){
            $statement=null;
            exit();
        }

        return $statement->fetch();

       
    }


       
}
