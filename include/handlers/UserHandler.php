<?php

include_once("../autoloader.php");
include_once('../../class/UserController.class.php');

if(isset($_POST['accept']))      accept();
if(isset($_POST['deny']))        deny();
if(isset($_POST['savechanges'])) update();
if(isset($_POST['updateImgUrl'])) updateImg();
if(isset($_POST['deleteaccount'])) delete();


if(isset($_POST["signup"]))
{

   //collecting the data
   
   $first_name = $_POST["first_name"];
   $last_name = $_POST["last_name"];
   $email = $_POST["email"]; 
   $password = $_POST["password"]; 
   $confirm_password = $_POST["confirm_password"]; 

   // instantiate SignupContr class
    $signUpCtr=new SignupContr($first_name,$last_name,$email,$password,$confirm_password);

   // Running error handlers and user signup
    $signUpCtr->SignUpUr();
   // Going back to the front page
    header("location: ../../login.php");
}
// signup -------------------------------
// signup -------------------------------

// login---------------------------------
// login---------------------------------
if(isset($_POST["login"]))
{

   //collecting the data
   $email = $_POST["email"]; 
   $password = $_POST["password"]; 

   // instantiate LoginContr class
    $LoginCtr=new LoginContr($email,$password);

   // Running error handlers and user signup
    $LoginCtr->LoginUr();
   // Going back to the front page

}
// login---------------------------------
// login---------------------------------



// profil--------------------------------
// profil--------------------------------
function update(){
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $tel = $_POST['tel'];
   $bank = $_POST['bank'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $new_password = $_POST["newPassword"]; 
   $id = $_POST['id'];

   // $hashedPwd = password_hash($new_password,PASSWORD_DEFAULT);
   // $hashedPwd2 = password_hash($password,PASSWORD_DEFAULT);

   $userpr = new UserController($first_name,$last_name,$email,$password,$tel,$bank);
  
   $userpr->profilSubmit();
   $userpr->updateInfo($first_name,$last_name,$tel,$bank,$email,$new_password,$id);
   header("location:../../dash/index.php?page=profil");
}
// profil--------------------------------
// profil--------------------------------

function delete()
 {
        $id = $_POST['id'];
        $user = new UserController($id);
        $user->deleteUser(intval($id));
        header("location:../../login.php?msg2=Account deleted succesfully");
 }

function accept(){
   $id = $_POST['id'];
   $role = 1;

   $user = new UserController();
   $user->updateUser($role,$id);
   echo "<script>window.location.replace('../../dash?page=allUsers')</script>";
}
function deny(){
   $id = $_POST['id'];
   $role = 0;

   $user = new UserController();
   $user->updateUser($role,$id);
   echo "<script>window.location.replace('../../dash?page=allUsers')</script>";
   
}



function updateImg(){
   $imgURL =  $_POST['updateImgUrl'];
   $id_user = $_SESSION['user']['id'];
   $UserModel = new UserModel();
   if($UserModel->updateUserImg($imgURL,$id_user)) $_SESSION['user']['image']=$imgURL;
   else echo "failed";
}