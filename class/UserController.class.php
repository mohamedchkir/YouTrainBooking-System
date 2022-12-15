<?php

include_once('UserModel.class.php');
include_once('LoginContr.class.php');
// include_once('../include/handlers/voyagehandler.php');
// session_start();

class UserController extends UserModel
{
  

   private $first_name;
   private $last_name;
   private $email;
   private $password;
   private $tel;
   private $bank;
   private $new_password;


   public function __construct($first_name="default",$last_name="default",$email="default",$password="default",$tel="default",$bank="default",$new_password="default")
   {
       $this->first_name = $first_name;
       $this->last_name = $last_name;
       $this->email = $email;
       $this->password = $password;
       $this->tel = $tel;
       $this->bank = $bank;
       $this->new_password = $new_password;
   }
   public  function getUserInfoe()
   {
   return array($this->last_name,$this->first_name,$this->email,$this->password);
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
 public function deleteUser($id)
 {
        return $this->deleteUserAcc($id);
 }

 public function updateInfo($first_name, $last_name, $tel, $bank, $email,$new_password,$id)
 {
   return $this->updateUserInfo($first_name, $last_name, $tel, $bank, $email,$new_password,$id);
 }



// some verification



public function profilSubmit(){
   if ($this->PrEmail()==false){
       header("location:../../dash/index.php?page=profil?msg=Enter a valid email ");
       exit();
   }else if ($this->passwordMatch()==false){
       header("location:../../dash/index.php?page=profil&msg=Wrong Password");
       exit();
   }else{
      $this->updateUserInfo($this->first_name,$this->last_name,$this->tel,$this->bank,$this->email,$this->new_password,$this->id);

   }
}


public function PrEmail(){
   if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
      $result = false;
   }
   else{
       $result = true ;
   }
   return $result;
}

public function passwordMatch(){
   if($this->password!=$_SESSION['user']["password"])
   {
       $result = false ;
   }
   else {
       $result = true;
   }
   return $result;
}


 
}

