<?php
session_start();

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
    <!-- MDB -->



    <title>YouTrain Booking</title>
 <!--Boostrap Icons CDN -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="../assets/css/style2.css">
 <style>

 </style>
</head>

<body>
 <header>
  <nav class="navbar navbar-expand-lg navbar-light   ">
   <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand p-0 " href="../index.php">
     <img src="../assets/img/YouTrain™2.png" alt="Youtrain logo" style="width: 100px">
    </a>
    <button onclick="makeaMargin(this)" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
     <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
     <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item">
       <a class="nav-link active py-0 px-3" aria-current="page" href="#">
        <i class="bi bi-person me-2"></i>
        <i>Mounir El Bakkali</i>
       </a>
      </li>
      <li class="vr" style="background-color: var(--dark-blue);width: 1px ;"></li>
      <li class="nav-item">
       <a class="nav-link active py-0 px-3" aria-current="page" href="#">
        <i class="bi bi-bag me-2"></i>
        <i>My Orders</i>

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
  <div class="row w-100">
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
     <form class="needs-validation" action="../include/handlers/voyagehandler.php" method="post" novalidate>
         <div class="row g-2">
             <div class="col-lg-6 text-start" style="position: relative;">
                 <label for="" class="form-label ms-2" style="color:#80808078;">gare de depart</label>
                 <input class="form-control" type="text" name="gare_depart" id="gare_depart_reseach" value="<?= $_SESSION['search-info']['gare_depart'] ?>" placeholder="Casa voyageur.." autocomplete="off" required>
                 <div class="invalid-feedback ms-2">
                     veillez remplire la gare de départ.
                 </div>
                 <input type="hidden" value="" name="id_ville_gare_depart">
                 <div class="rounded-bottom" style="background-color:aliceblue;position:absolute; width: 94%;z-index:100;max-height:31vh;overflow:auto;" id="cities_rst1"></div>
             </div>
             <div class="col-lg-6 text-start" style="position: relative;">
                 <label for="" class="form-label ms-2" style="color:#80808078;">gare de distination</label>
                 <input class="form-control " type="text" name="gare_distination" id="gare_distination_reseach" autocomplete="off" value="<?= $_SESSION['search-info']['gare_distination'] ?>" placeholder="Tanger ville..">
                 <div class="rounded-bottom" style="background-color:aliceblue;position:absolute; width: 94%;z-index:100;max-height:31vh;overflow:auto;" id="cities_rst2"></div>
                 <input type="hidden" value="" name="id_ville_gare_distination">
             </div>
             <div class="col-12">
                 <label class="form-label ms-2" for="" style="color:#80808078;" >date départ</label>
                 <input class="form-control" type="datetime-local" name="date_depart" value="<?= $_SESSION['search-info']['date_depart'] ?>" required>
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
   <div class="col-lg-8">
    <div class="container p-3">
     <div>
      <div class="d-flex justify-content-between align-items-center border-bottom">
       <H2>Available Trains</H2>
       <small class="text-secondary">
        5 Trains Avialable
       </small>
       <h3><i class="bi bi-sliders text-weight-bold aqua"></i></h3>
      </div>
      <div class="row gy-3 p-3 mt-3" style="width:100%;height:85vh;overflow:auto;">
       <div class="px-5 py-3 shadow " style="background-color:white;border-radius:10px;">
        <div class="d-flex align-items-center">
         <div class="d-flex justify-content-between flex-grow-1 px-3">
          <div>
           <p>départ</p>
           <h3>8:30</h3>
           <p><?= $_SESSION['search-info']['gare_depart'] ?></p>
          </div>
          <div class="voyage-info  w-50 text-center">
           <label for="">3h30min</label>
           <div class="d-flex justify-content-between">
                <span style="width:50%;position: relative">
                    <span class="bubble bubble1"></span>
                </span>
               <span style="width: 50%">
                   <span class="bubble"></span>
               </span>
           </div>
           <label for="">Direct</label>
          </div>
          <div class="text-center">
           <p>Arrivé</p>
           <h3>11:15</h3>
           <p><?= $_SESSION['search-info']['gare_distination'] ?></p>
          </div>
         </div>
         <div class=" align-items-center text-center p-4" style="border-left: 2px dotted  #80808078;">
          <h4>1 passager</h4>
          <h5>à partir </h5>
          <span>
           <h4 class="text-danger">219 DH</h4>
          </span>
          <button class="btn text-light px-5 "  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAbandonedCart" style="background-color:var(--aqua);border-radius:20px;">Réserver</button>
         </div>
        </div>
        <hr class="w-100 m-0">
        <div class="d-flex align-items-center">
         <h3>
          <i class="bi bi-train-lightrail-front"></i>
         </h3>
         <h6 class="ms-3">Atlas</h6>
        </div>
       </div>
       <!-- YouTrain™2 -->
          <div class="px-5 py-3 shadow " style="background-color:white;border-radius:10px;">
              <div class="d-flex align-items-center">
                  <div class="d-flex justify-content-between flex-grow-1 px-3">
                      <div>
                          <p>départ</p>
                          <h3>8:30</h3>
                          <p><?= $_SESSION['search-info']['gare_depart'] ?></p>
                      </div>
                      <div class="voyage-info  w-50 text-center">
                          <label for="">3h30min</label>
                          <div class="d-flex justify-content-between">
                              <span class="bubble"></span>
                              <span class="bubble"></span>
                          </div>
                          <label for="">Direct</label>
                      </div>
                      <div class="text-center">
                          <p>Arrivé</p>
                          <h3>11:15</h3>
                          <p><?= $_SESSION['search-info']['gare_distination'] ?></p>
                      </div>
                  </div>
                  <div class=" align-items-center text-center p-4" style="border-left: 2px dotted  #80808078;">
                      <h4>1 passager</h4>
                      <h5>à partir </h5>
                      <span>
           <h4 class="text-danger">219 DH</h4>
          </span>
                      <button class="btn text-light px-5 "  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAbandonedCart" style="background-color:var(--aqua);border-radius:20px;">Réserver</button>
                  </div>
              </div>
              <hr class="w-100">
              <div class="d-flex align-items-center">
                  <h3>
                      <i class="bi bi-train-lightrail-front"></i>
                  </h3>
                  <h6 class="p-3">Atlas</h6>
              </div>
          </div>

          <!-- YOU TRAIN 3--->
          <div class="px-5 py-3 shadow " style="background-color:white;border-radius:10px;">
              <div class="d-flex align-items-center">
                  <div class="d-flex justify-content-between flex-grow-1 px-3">
                      <div>
                          <p>départ</p>
                          <h3>8:30</h3>
                          <p><?= $_SESSION['search-info']['gare_depart'] ?></p>
                      </div>
                      <div class="voyage-info  w-50 text-center">
                          <label for="">3h30min</label>
                          <div class="d-flex justify-content-between">
                              <span class="bubble"></span>
                              <span class="bubble"></span>
                          </div>
                          <label for="">Direct</label>
                      </div>
                      <div class="text-center">
                          <p>Arrivé</p>
                          <h3>11:15</h3>
                          <p><?= $_SESSION['search-info']['gare_distination'] ?></p>
                      </div>
                  </div>
                  <div class=" align-items-center text-center p-4" style="border-left: 2px dotted  #80808078;">
                      <h4>1 passager</h4>
                      <h5>à partir </h5>
                      <span>
           <h4 class="text-danger">219 DH</h4>
          </span>
                      <button class="btn text-light px-5 "  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAbandonedCart" style="background-color:var(--aqua);border-radius:20px;">Réserver</button>
                  </div>
              </div>
              <hr class="w-100">
              <div class="d-flex align-items-center">
                  <h3>
                      <i class="bi bi-train-lightrail-front"></i>
                  </h3>
                  <h6 class="p-3">Atlas</h6>
              </div>
          </div>

          <!-------4----->

          <div class="px-5 py-3 shadow " style="background-color:white;border-radius:10px;">
              <div class="d-flex align-items-center">
                  <div class="d-flex justify-content-between flex-grow-1 px-3">
                      <div>
                          <p>départ</p>
                          <h3>8:30</h3>
                          <p><?= $_SESSION['search-info']['gare_depart'] ?></p>
                      </div>
                      <div class="voyage-info  w-50 text-center">
                          <label for="">3h30min</label>
                          <div class="d-flex justify-content-between">
                              <span class="bubble"></span>
                              <span class="bubble"></span>
                          </div>
                          <label for="">Direct</label>
                      </div>
                      <div class="text-center">
                          <p>Arrivé</p>
                          <h3>11:15</h3>
                          <p><?= $_SESSION['search-info']['gare_distination'] ?></p>
                      </div>
                  </div>
                  <div class=" align-items-center text-center p-4" style="border-left: 2px dotted  #80808078;">
                      <h4>1 passager</h4>
                      <h5>à partir </h5>
                      <span>
           <h4 class="text-danger">219 DH</h4>
          </span>
                      <button class="btn text-light px-5 "  type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAbandonedCart" style="background-color:var(--aqua);border-radius:20px;">Réserver</button>
                  </div>
              </div>
              <hr class="w-100">
              <div class="d-flex align-items-center">
                  <h3>
                      <i class="bi bi-train-lightrail-front"></i>
                  </h3>
                  <h6 class="p-3">Atlas</h6>
              </div>
          </div>
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
                     <a type="button" class="btn btn-info">Go to cart</a>
                     <a type="button" class="btn btn-outline-info waves-effect" data-bs-dismiss="modal">Cancel</a>
                 </div>
             </div>
             <!--/.Content-->
         </div>
     </div>
 </section>
</body>

<!-- Modal: modalAbandonedCart-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="../assets/js/main2.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</html>