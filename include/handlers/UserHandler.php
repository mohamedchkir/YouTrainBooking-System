<?php

include_once("../autoloader.php");

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