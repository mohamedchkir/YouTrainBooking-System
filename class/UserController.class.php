<?php

include_once('UserModel.class.php');
include_once('LoginContr.class.php');
// include_once('../include/handlers/voyagehandler.php');
session_start();

class UserController extends UserModel
{
  
   



   public function getUserInfo($id){
      $query = "SELECT * FROM `users` WHERE id=?;";
      $statement=$this->connect()->prepare($query);
      if(!$statement->execute(array($id))){
          $statement=null;
          exit();
      }
      $arr = $statement->fetchAll();
      return $arr;
  }

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

 public function updateInfo($first_name, $last_name, $tel, $bank, $email,$password, $id)
 {
   $loginContr= new LoginContr($email,$password);
   $userInfo =$loginContr->getUser($email);
   $_SESSION["user"] = $userInfo;
   return $this->updateUserInfo($first_name, $last_name, $tel, $bank, $email,$password, $id);
 }
//  public function emptyInputProfil($first_name, $last_name, $tel, $bank, $email, $password, $id){
//    if(empty($this->first_name) || empty($this->last_name) || empty($this->$tel) || empty($this->password) || empty($this->$bank) || empty($this->new_password)){
//        $result = false;
//    }
//    else {
//        $result = true;
//    }
//    return $result;
// }

// private function verifyEdit($userinfo){
       
//    if(!$userinfo){
//        header("location:../../index.php?page=profil?msg=Your email is not part of our records");
//    }else{
//        $checkpwd = password_verify($this->password,$userinfo["password"]);
//        if($checkpwd == false){
//            header("location:../../index.php?page=profil?msg=Wrogn password");
//        }elseif($checkpwd == true){
//            $_SESSION["user"] = $userinfo;
          

//            header("location:../../index.php?page=profil");
//        }
//    }
   
// }

// public function profilSubmit(){
//    if($this->emptyInputProfil()==false){
//        header("location:../../index.php?page=profil?msg=fill all fields");
//        exit();
//    }
//       $userinfo =  $this->getUser($this->email,$this->password);
//       $this->verifyEdit($userinfo);
   
// }
 
}

