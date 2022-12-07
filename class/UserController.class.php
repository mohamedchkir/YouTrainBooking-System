<?php

include_once('UserModel.php');
// include_once('../include/handlers/voyagehandler.php');

class UserController extends UserModel
{
 public function getUser(){
    
    return $this->getAllUser();
 }

 public function updateUser($role,$id)
 {
    return $this->updateRoleInDB($role,$id);
     // do some verification
 }
 public function supprimerUser($id)
 {

 }

 
}

