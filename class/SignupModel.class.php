<?php

include_once("DB.php");

class SignupModel extends DB{
    protected function Validation($email){
       $query = "SELECT * FROM users WHERE Email =? ;";
       $statement = $this->Connect()->prepare('SELECT * FROM users WHERE  email = ?;');

       if(!$statement->execute(array($email))){
        $statement=null ;
        echo "statement failed";
        exit();
    }
    
    if($statement->rowCount()>0){
        $resultCheck=false;
    }else{
        $resultCheck=true;
    }
    return $resultCheck;
}

public function createUser($first_name ,$last_name,$email,$password){
    $hashedPwd = password_hash($password,PASSWORD_DEFAULT);
    $query = "INSERT INTO users (prenom,nom,email,password) VALUES (?,?,?,?);";
    $statement = $this->connect()->prepare($query);
    if(!$statement->execute(array($first_name,$last_name,$email, $hashedPwd))){
        $statement=null;
        header("location : ../signup.php");
        exit();
    }
}
       
}
