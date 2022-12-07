<?php

include_once("../autoloader.php");


if(isset($_POST["accept"]))   accept();
if(isset($_POST["deny"]))   deny();

if(isset($_POST["signup"]))
{

   //collecting the data
   $first_name = $_POST["First_name"];
   $last_name = $_POST["Last_name"];
   $email = $_POST["email"]; 
   $password = $_POST["password"]; 
   $confirm_password = $_POST["password"]; 

   // instantiate SignupContr class
    $signUpCtr=new SignupContr($first_name,$last_name,$email,$password,$confirm_password);

    var_dump($signUpCtr->checkEmail());
    exit();
    

   // Running error handlers and user signup

   // Going back to the front page


}


function accept()
{
   $id = $_POST['id'];
   $role = 1;
   $user =new UserController();
   $user->updateUser($role,$id);
   echo "<script>window.location.replace('../components/uers.component.php')</script>";
}

function deny()
{
   $id = $_POST["id"];
   $role = 0;
   $user =new UserController();
   $user->updateUser($role,$id);
   echo "<script>window.location.replace('../components/uers.component.php')</script>";
   
}