<?php

include_once('UserModel.php');
// include_once('../include/handlers/voyagehandler.php');

class UserController extends UserModel
{
 public function getUser(){
    
    return $this->getAllUser();
 }

 public function updateUser(User $user,$id)
 {
    
     // do some verification
 }
 public function supprimerUser($id)
 {

 }

 
}

