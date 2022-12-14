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


























// <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
// <div class="container-fluid">
//     <a class="navbar-brand p-0 " href="#">
//         <img src="assets/img/YouTrain™2.png" alt="Youtrain logo" style="width: 100px">
//     </a>
//     <div class="collapse navbar-collapse justify-content-end" >
//         <ul class="navbar-nav mb-2 mb-lg-0">
//                 <li class="nav-item">
//                     <a class="nav-link active py-0 px-3 text-dark" id="login" aria-current="page" href="login.php" style="font-weight: 500;">
//                         <span>Log in</span>
//                     </a>
//                 </li>
//                 <li class="vr" style="background-color: var(--dark-blue);width: 1px ;"></li>
//                 <li class="nav-item">
//                     <a class="nav-link active py-0 px-3" aria-current="page" href="signup.php" id="sign_up">
//                         <span style="background-color: var(--aqua);color: white;padding: 7px 25px;border-radius: 25px;font-weight: 500;">Sign up</span>
//                     </a>
//                 </li>
//             </ul>
//     </div>
// </div>    
// </nav>

// <!-- banner image  -->
// <div class="banner-image w-100 vh-100 d-flex justify-content-center align-items-center bnr">
// <div class="content text-center"></div>


// <div class="content text-center">
//     <h1 class="text-dark">WELCOME</h1>
// </div>
// </div> 