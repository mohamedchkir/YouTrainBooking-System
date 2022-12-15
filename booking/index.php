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
    <!-- sweet alert     -->
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
         <?php
         if(isset($_SESSION["user"])){
             echo "<li class='nav-item'>
                                   <a class='nav-link active py-0 px-3' aria-current='page' href='#'>
                                    <i class='bi bi-person me-2'></i>
                                       <i>".$_SESSION['user']['prenom']." ".$_SESSION['user']['nom']."</i>
                                   </a>
                                   </li>
                                   <li class='vr' style='background-color: var(--dark-blue);width: 1px ;'></li>
                                   <li class='nav-item'>
                                   <a class='nav-link active py-0 px-3 d-flex' aria-current='page' href='#'>
                                    <h4><i class='bi bi-bookmarks me-2'></i></h4>
                                    <i>Mes ancien réservations</i>
                                   </a>
                                  </li>
                                   ";
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
      <li class="vr" style="background-color: var(--dark-blue);width: 1px ;"></li>
      <li class="nav-item">
       <a class="nav-link active py-0 px-3 d-flex align-items-center" aria-current="page" href="#">
           <h4 class="position-relative">
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;" id="order_counter" >
                <?php echo isset($_SESSION['order-list']) ?  count($_SESSION['order-list']) :  '0'  ?>
                </span>
               <span style="display: none" counter="<?php echo isset($_SESSION['order-list']) ?  count($_SESSION['order-list']) :  '0'  ?>">order counter</span>
<!--               <span class="badge badge-danger" id="shoppingOrdersSpan">9</span>
-->               <i class="bi bi-cart me-2" id="cartBtn" role="button"></i>
           </h4>

       </a>
      </li>
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
 <section style="height:94vh ;" class="bg-light">
  <div class="row w-100 m-0">
   <div class="col-lg-4">
    <div class="container py-3 ">
     <h3 class="aqua text-weight-bold">Your search results</h3>
     <div class="py-5">
      <ul class="timeline">
       <li class="timeline-item mb-5">
        <h5 class="fw-bold"><?= $_SESSION['search-info']['gare_depart'] ?></h5>
        <p class="text-muted mb-2 fw-bold"><?= $_SESSION['search-info']['date_formed'] ?></p>
        <p class="text-muted">
         Lorem ipsum dolor sit amet consectetur adipisicing elit.
        </p>
       </li>

       <li class="timeline-item mb-5">
        <h5 class="fw-bold"><?= $_SESSION['search-info']['gare_distination'] ?></h5>
        <p class="text-muted mb-2 fw-bold"><?= $_SESSION['search-info']['date_retour'] ?></p>
        <p class="text-muted">
         Quisque ornare dui nibh, sagittis egestas nisi luctus nec.
        </p>
       </li>
      </ul>
     </div>
     <form class="needs-validation" action="../include/handlers/voyagehandler.php" method="post" id="search_again" novalidate>
         <div class="row g-2">
             <div class="col-lg-6 text-start" style="position: relative;">
                 <label for="" class="form-label ms-2" style="color:#80808078;">gare de depart</label>
                 <input class="form-control" type="text" name="gare_depart" id="gare_depart_reseach" placeholder="Casa voyageur.." autocomplete="off" required>
                 <div class="invalid-feedback ms-2">
                     veillez remplire la gare de départ.
                 </div>
                 <input type="hidden" value="" name="id_ville_gare_depart" id="id_ville_gare_depart">
                 <div class="rounded-bottom" style="background-color:aliceblue;position:absolute; width: 94%;z-index:100;max-height:31vh;overflow:auto;" id="cities_rst1"></div>
             </div>
             <div class="col-lg-6 text-start" style="position: relative;">
                 <label for="" class="form-label ms-2" style="color:#80808078;">gare de distination</label>
                 <input class="form-control " type="text" name="gare_distination" id="gare_distination_reseach" autocomplete="off" value="" placeholder="Tanger ville..">
                 <div class="rounded-bottom" style="background-color:aliceblue;position:absolute; width: 94%;z-index:100;max-height:31vh;overflow:auto;" id="cities_rst2"></div>
                 <input type="hidden" value="" name="id_ville_gare_distination">
             </div>
             <div class="col-12">
                 <label class="form-label ms-2" for="" style="color:#80808078;" >date départ</label>
                 <input class="form-control" type="datetime-local" name="date_depart" required>
                 <div class="invalid-feedback ms-2">
                     veillez remplire la date de départ de votre voyage.
                 </div>
             </div>

         </div>
         <div class="py-2 pt-4">
             <button class="btn p-2  w-100" style="background-color:var(--aqua);color:white;border-radius:20px;" name="search_again" type="submit" id="search_again">Search again</button>
         </div>
     </form>
    </div>
   </div>
   <div class="col-lg-8 pe-0">
    <div class="container ">
     <div>
      <div class="d-flex justify-content-between align-items-center border-bottom">
       <H2>Voyage Disponible</H2>
       <small class="text-secondary">
        <?php echo count($_SESSION['resultat']) ?> voyage disponible
       </small>
       <h3><i class="bi bi-sliders text-weight-bold aqua"></i></h3>
      </div>
      <div class="row px-2 g-3 mt-3" style="width:100%;height:85vh;overflow:auto;">
          <?php
          foreach ($_SESSION['resultat'] as $voyage){
              echo "
              <div class='p-3 shadow ' style='background-color:#f1fcff;border-radius:10px;height: fit-content;'>
                <div class='row align-items-center'>
                 <div class='col-lg-8 d-flex justify-content-between flex-grow-1 px-3'>
                  <div>
                   <p>départ</p>
                   <h4>".date("H:i",strtotime($voyage["date"]))."</h4>
                   <p>".$voyage['garedepart']."</p>
                  </div>
                  <div class='voyage-info  w-50 text-center'>
                   <label for=''>".$voyage["duree"].'h'.'00min'."</label>
                   <div class='d-flex justify-content-between'>
                        <span style='width:50%;position: relative'>
                            <span class='bubble bubble1'></span>
                        </span>
                       <span style='width: 50%'>
                           <span class='bubble'></span>
                       </span>
                   </div>
                   <label for=''>Direct</label>
                  </div>
                  <div class='text-center'>
                   <p>Arrivé</p>
                   <h4>".date("H:i",strtotime($voyage["date"]." +".$voyage['duree']." hours"))."</h4>
                   <p>".$voyage['garearrivee']."</p>
                  </div>
                 </div>
                 <div class='col-lg-4 align-items-center text-center p-4' style='border-left: 2px dotted  #80808078;'>
                  <h5>1 passager</h5>
                  <h6>à partir </h6>
                  <span>
                   <h5 class='text-danger'>".$voyage['prix']." DH</h5>
                  </span>
                  <button class='btn text-light px-lg-4 '  type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#modalAbandonedCart' style='background-color:var(--aqua);border-radius:20px;'
                   onclick=\"bookTicket({id:'".$voyage['id']."',from:'".$voyage['garedepart']."',to:'".$voyage['garearrivee']."',date:'".$voyage['date']."',prix:'".$voyage['prix']."'})\">Réserver</button>
                 </div>
                </div>
                <hr class='w-100 m-0'>
                <div class='d-flex align-items-center'>
                 <h3>
                  <i class='bi bi-train-lightrail-front'></i>
                 </h3>
                 <h6 class='ms-3'>".$voyage['train']."</h6>
                </div>
               </div>
              ";
          }

          ?>




      </div>
     </div>
    </div>
   </div>
  </div>
     <!-- Button trigger modal-->

     <!-- Modal: modalAbandonedCart-->
     <div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
          aria-hidden="true" data-backdrop="false" style="position: fixed">
         <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
             <!--Content-->
             <div class="modal-content">
                 <!--Header-->
                 <div class="modal-header bg-info">
                     <p class="heading">Product in the cart
                     </p>

                     <button type="button" class="close btn text-light bg-gradient" data-bs-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true" class="white-text">&times;</span>
                     </button>
                 </div>

                 <!--Body-->
                 <div class="modal-body">

                     <div class="row">
                         <div class="col-3">
                             <p></p>
                             <p class="text-center"><i class="fas fa-shopping-cart fa-4x text-info" ></i></p>
                         </div>

                         <div class="col-9">
                             <p>Do you need more time to make a purchase decision?</p>
                             <p>No pressure, your product will be waiting for you in the cart.</p>
                         </div>
                     </div>
                 </div>

                 <!--Footer-->
                 <div class="modal-footer justify-content-center">
                     <a type="button" class="btn btn-info" id="goTocart" data-bs-dismiss="modal">Go to cart</a>
                     <a type="button" class="btn btn-outline-info waves-effect" data-bs-dismiss="modal">Cancel</a>
                 </div>
             </div>
             <!--/.Content-->
         </div>
     </div>
 </section>
</body>
<!-- Modal: modalAbandonedCart-->

<!--Cart Start-->
<div class="container w-sm-100 w-md-75 w-lg-30 p-4" id="cart" style="height: 100vh;">
    <div class="pb-3">
        <i class="bi bi-x-lg text-light text-bold" role="button" id="closeCartBtn"></i>
    </div>
    <h4 class="text-light">Your Cart</h4>
    <div class="d-flex flex-column align-items-center" id="lis_orders_div" style="height: 88vh;overflow: auto">
        <?php
        if (isset($_SESSION['order-list']) && count($_SESSION['order-list'])>0){
            $list_of_orders=$_SESSION['order-list'];
            //print_r($list_of_orders);
            $i=0;
            $total=0;
            foreach ($list_of_orders as $order) {
                // echo "<script>alert('$order')</script>";
                //var_dump($order);
                $total+=floatval($order['prix_ticket'])*$order['quantity'];
                echo "
                <div class='bg-light rounded-3 mb-1 w-100'>
                <div class='d-flex justify-content-between  flex-grow-1 p-3 align-items-center'>
                   <div style=\"background: url('../assets/img/reserved-bg.jpg');background-size:cover;background-position:center;width: 100px;height: 100px\"></div>
                    <div>
                        <p>De :  " . $order['gare_depart'] . "</p>
                        <p>vers :  " . $order['gare_arrive'] . "</p>
                    </div>
                    <div>
                    <h6 style='color:orange;font-weight: bold'>".$order['quantity']." place(s)</h6cla>
                    <h5 class='text-center'>" . floatval($order['prix_ticket'])*$order['quantity'] . "Dh</h5>
                    </div>
                    <div>
                        <i class='bi bi-x-lg text-danger btn btn-rounded' role='button' onclick=\"removeReserved('" . $i . "')\"></i>
                    </div>
                </div>
            </div>
            ";
                $i++;
            }

            echo "<div class='mt-auto p-2 w-100'>
                <button class='btn btn-light w-100' onclick='processCheckingOut()'>check out</button>
                <h6 class='text-light mt-1'> <i class='bi bi-check-circle-fill me-2'></i>Total à payer : <b>$total DH</b></h6>
                <h6 class='text-light mt-1'> <i class='bi bi-check-circle-fill me-2'></i>Tout ticket de type FLEX sont changeable</h6>

                </div>";
            //unset($_SESSION['order-list']);
        }else{
            echo "
                <div class='h-100 w-100'>
                    <div class='h-50' style=\"background-image: url('../assets/img/empty_cart.png');background-position: center;background-size: cover;background-repeat: no-repeat\"></div>
                </div>
            ";
        }
        //print_r($_SESSION['order-list']);
        ?>
    </div>


</div>
<!--Cart End-->

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