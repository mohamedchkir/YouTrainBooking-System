<?php

include_once('UserModel.class.php');
include_once('LoginContr.class.php');
// include_once('../include/handlers/voyagehandler.php');
// session_start();

class UserController extends UserModel
{
  
   



//    public function getUserInfo($id){
//       $query = "SELECT * FROM `users` WHERE id=?;";
//       $statement=$this->connect()->prepare($query);
//       if(!$statement->execute(array($id))){
//           $statement=null;
//           exit();
//       }
//       $arr = $statement->fetchAll();
//       return $arr;
//   }

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

 public function updateInfo($first_name, $last_name, $tel, $bank, $email, $id)
 {
   return $this->updateUserInfo($first_name, $last_name, $tel, $bank, $email,$id);
 }



// some verification



// public function profilSubmit(User $user){
//    if($this->emptyInputProfil()==false){
//        header("location:../../dash/index.php?page=profil?msg=fill all fields");
//        exit();
//    }elseif ($this->PrEmail()==false){
//        header("location:../../dash/index.php?page=profil?msg=Enter a valid email ");
//        exit();
//    }elseif ($this->passwordMatch()==false){
//        header("location:../../signup.php?msg=Wrong Password");
//        exit();
//    }elseif ($this->emailTaken() == false){
//        header("location:../../signup.php?msg=Email is already taken");
//        exit();
//    }
//        $this->updateUserInfo($this->first_name,$this->last_name,$this->tel,$this->bank,$this->email,$this->password);
// }




 public function 
 emptyInputProfil($first_name, $last_name, $tel, $bank, $email, $password){
   if(empty($this->first_name) || empty($this->last_name) || empty($this->$tel) || empty($this->password) || empty($this->$bank) || empty($this->new_password)){
       $result = false;
   }
   else {
       $result = true;
   }
   return $result;
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

// public function passwordMatch(){
//    if($this->password !== $user["password"]){
//        $result = false ;
//    }
//    else {
//        $result = true;
//    }
//    return $result;
// }

// public function emailTaken(){
//    if($this->email == $user["email"]){
//        $result = false ;
//    }
//    else {
//        $result = true;
//    }
//    return $result;
// }


 
}

