<?php
session_start();
include_once("../include/autoloader.php");
if(!isset($_SESSION['search-info'])){
    header("location:../");
}

//var_dump($_SESSION['resultat']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
            rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
            rel="stylesheet"
    />
    <!-- sweet alert -->
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">



    <title>YouTrain Booking</title>
 <!--Boostrap Icons CDN -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="../assets/css/style2.css">
 <style>
     div#cart {
         position: absolute;
         right: 0;
         top: 0;
         z-index: 1000;
         background-color: #5bb7f5fa;
         display: none;
         /*
         transform: translateX(537px);
         */
     }
 </style>
</head>

<body>
 <header>
  <nav class="navbar navbar-expand-lg navbar-light   ">
   <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand p-0 " href="../index.php">
     <img src="../assets/img/YouTrain™2.png" alt="Youtrain logo" style="width: 100px">
    </a>
    <button  class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end p-2" id="navbarSupportedContent">
     <ul class="navbar-nav mb-2 mb-lg-0">
     <li class="nav-item">
       <a class="nav-link active py-0 px-3 d-flex align-items-center" aria-current="page" href="#">
           <h4 class="position-relative mt-1">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;" id="order_counter" >
                <?php echo isset($_SESSION['order-list']) ?  count($_SESSION['order-list']) :  '0'  ?>
                </span>
               <span style="display: none" counter="<?php echo isset($_SESSION['order-list']) ?  count($_SESSION['order-list']) :  '0'  ?>">order counter</span>
              <!-- <span class="badge badge-danger" id="shoppingOrdersSpan">9</span> -->
               <i class="bi bi-cart me-2" id="cartBtn" role="button"></i>
           </h4>

       </a>
      </li>
        <?php
        if(isset($_SESSION["user"])){
            echo "
            <li class='nav-item dropdown no-arrow mb-3 me-4'>
                <a class='nav-link dropdown-toggle nav-link active py-0 px-3' href='#' id='userDropdown' data-bs-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                <i class='bi bi-person me-2 fs-3'></i>
                <i>".$_SESSION['user']['prenom']." ".$_SESSION['user']['nom']."</i>
                </a>
                <!-- Dropdown -->
                <div class='dropdown-menu dropdown-menu-right shadow animated--grow-in' aria-labelledby='userDropdown'>
                    <a class='dropdown-item d-flex align-items-center' href='index.php'>
                        <i class='bi bi-bookmarks me-2'></i>
                        <i> Mes ancien réservations </i>
                    </a>
                    <a class='dropdown-item d-flex' href='profile.php'>
                        <i class='bi bi-person-circle me-2'></i>
                        <i>Profil</i>
                    </a>
                    <div class='dropdown-divider'></div>
                    <a class='dropdown-item d-flex' href='../include/logout.inc.php'>
                        <i class='bi bi-box-arrow-left me-2'></i>
                        <i>Logout</i>
                    </a>
                </div>
            </li>";
        }else{
            echo "
            <li class='nav-item'>
            <a class='nav-link active py-0 px-3 ' id='login' aria-current='page' href='../login.php' style='font-weight: 500;'>
                <span>Log in</span>
            </a>
            </li>
            <li class='vr' style='background-color: var(--dark-blue);width: 1px ;'></li>
            <li class='nav-item'>
                <a class='nav-link active py-0 px-3' aria-current='page' href='../signup.php' id='sign_up'>
                    <span style='background-color: var(--aqua);color: white;padding: 7px 25px;border-radius: 25px;font-weight: 500;'>Sign up</span>
                </a>
            </li>
            ";
        }

         ?>
      <!-- <li class="vr" style="background-color: var(--dark-blue);width: 1px ;"></li> -->
      
      <!-- <li class="nav-item">
       <a class="nav-link active py-0 px-3 " id="login" aria-current="page" href="login.php" style="font-weight: 500;">
        <span>Log in</span>
       </a>
      </li>
      <li class="vr" style="background-color: var(--dark-blue);width: 1px ;"></li>
      <li class="nav-item">
       <a class="nav-link active py-0 px-3" aria-current="page" href="signup.php" id="sign_up">
        <span style="background-color: var(--aqua);color: white;padding: 7px 25px;border-radius: 25px;font-weight: 500;">Sign up</span>
       </a>
      </li> -->
     </ul>
    </div>
   </div>
  </nav>
 </header>
 
<div class="w-100">
    <div class=" p-5 mt-5">
      
        <div class="card-header bg-transparent d-flex justify-content-center">
            <div class="position-relative" style="width: fit-content">
                <div style="width: 150px;height:150px;background-image:url('../assets/img/user.png'); background-position:center; border-radius: 50%; background-size: cover;" id="img_holder"></div>
                <button idedit="Edit_<?php echo $_SESSION['user']['id']?>" class="rounded-circle border-0 position-absolute" onclick="editPhotoProfil()" style="background-color: var(--main-color);bottom:10px;right: 20px;padding: 5px;padding-inline: 9px;"><i class="fas fa-light fa-pen text-light"></i></button>
            </div>

        </div>
        <form action="../include/handlers/UserHandler.php" method="POST" class="needs-validation" class="card-body= w-100" novalidate>
            <input type="hidden" name="id" value="<?php echo $_SESSION['user']['id']?>">
                <div class="d-flex justify-content-between">
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">First name</label>    
                            <input class="form-control" type="text" name="first_name" value="" required>
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">Second name</label>
                            <input class="form-control"  type="text" name="last_name" value="" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">Phone number</label>
                            <input class="form-control" type="tel" name="tel" placeholder="0XXXXXXXXX" value="">
                        </div>
                    </div>
                    <div class="w-100">
                        <div class="p-3">
                            <label for="">Bank number</label>
                            <input class="form-control"  type="int" name="bank" value="<?php echo $_SESSION['user']['compte_Bancaire']?>" >
                        </div>
                    </div>
                </div>
                    <div class="p-3">
                        <label for="">Email</label>
                        <input class="form-control"  type="email" name="email" value="" required>
                    </div>
                <div class="d-flex justify-content-between">
                    <div class="w-50">
                        <div class="form-outline p-3">
                            <label class="form-label" for="">Old Password</label>
                            <input type="password"  name="password" class="form-control"  value="" required/>
                        </div>
                    </div>
                    

                    <div class="w-50">
                        <div class="form-outline p-3">
                        <label class="form-label" for="">New Password</label>
                        <input type="password"  name="newPassword" class="form-control"  value="" required/>
                    </div>
                    </div>
                    
                </div>    
                

                <div class="d-flex justify-content-end">
                     <div class="card-footer bg-transparent mt-5">
                        <button type="submit" class="btn btn-danger" name="deleteaccount">Delete account</button>
                    </div>
                    <div class="card-footer bg-transparent mt-5">
                        <button type="submit" class="btn btn-success" name="savechanges">Save changes</button>
                    </div>
                </div>
        </form>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/js/main2.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    document.forms.namedItem("search_again").addEventListener('submit',function (e){
        let gare_entred = $("#id_ville_gare_depart").val();
        if(gare_entred==""){
            e.preventDefault();
            alert("invalid gare identiant");
            return;
        }
        isGareExist(gare_entred,"../include/handlers/garehandler.php").then(data=>{
            if(!data){
                e.preventDefault();
                alert("invalid gare identiant");
            }
        })
    })
</script>

</html>