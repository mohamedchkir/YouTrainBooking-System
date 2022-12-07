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


    protected function updateRoleInDB($role,$id){
        try{
            $sql="UPDATE `users` SET `role`=? where `id`=$id";
            $statement = $this->Connect()->prepare($sql);
            $statement->execute(array($role));
            $_SESSION['message']="Role user has been update successfully";
        }catch(PDOException $er){
            $_SESSION['error']="Role user has been not update";
            // $error = $er->getMessage();
            echo $er->getMessage();
        }
    }

}