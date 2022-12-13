<?php

include_once("DB.php");

class LoginModel extends DB{

    public function getUser($email){
        // $query = "SELECT * FROM users WHERE email = ? AND disabled=1;";
        $query = "SELECT * FROM users WHERE email = ? ;";
        $statement = $this->connect()->prepare($query);
   
       
        if(!$statement->execute(array($email))){
            $statement=null;
            exit();
        }

        return $statement->fetch();

       
    }


       
}
