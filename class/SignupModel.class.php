<?php

include_once("DB.php");

class SignupModel extends DB{

    public function setUser($first_name ,$last_name,$email,$password){
        
        $query = "INSERT INTO users (prenom,nom,email,password) VALUES (?,?,?,?);";
        $statement = $this->connect()->prepare($query);
        // $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
       
        if(!$statement->execute(array($first_name,$last_name,$email, $password))){
            $statement=null;
            header("location : ../signup.php");
            exit();
        }
        $statement=null;
    }

    protected function Validation($email){
       $query = "SELECT nom FROM users WHERE   email = ?;";
       $statement = $this->Connect()->prepare($query);

       if(!$statement->execute(array($email))){
        $statement=null ;
       header("location: ../signup.php");
        exit();
    }
    
    if($statement->rowCount()>0){
        $resultCheck=false;
    }else{
        $resultCheck=true;
    }
    return $resultCheck;
}


       
}
