<?php

include_once('UserModel.php');
// include_once('../include/handlers/voyagehandler.php');
// session_start();

class UserController extends UserModel
{
 public function getUser(){
    
    return $this->getAllUser();
 }

 public function updateUser($role,$id)
 {
   try{
      return $this->updateRoleInDB($role,$id);
      $_SESSION['message']="Role user has been added successfully";
   }catch(PDOException $er){
      $_SESSION['error']="Role user has been not added";
   }
    
     // do some verification
 }
 public function supprimerUser($id)
 {
        
 }

 
}

