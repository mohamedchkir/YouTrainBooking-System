<?php

include_once("../autoloader.php");
// signup -------------------------------
// signup -------------------------------
if(isset($_POST["signup"]))
{

   //collecting the data
   $first_name = $_POST["First_name"];
   $last_name = $_POST["Last_name"];
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
    // header("location: ../index.php");
}
// login---------------------------------
// login---------------------------------