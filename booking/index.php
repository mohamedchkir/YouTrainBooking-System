<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>YouTrain Booking</title>
 <!--Boostrap Icons CDN -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="../assets/css/style2.css">
 <style></style>
</head>

<body>
 <header>
  <nav class="navbar navbar-expand-lg navbar-light   ">
   <div class="container-fluid d-flex justify-content-between">
    <a class="navbar-brand p-0 " href="#">
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
        <h5 class="fw-bold">Tanger ville</h5>
        <p class="text-muted mb-2 fw-bold">01 Dec 2022 08:30</p>
        <p class="text-muted">
         Lorem ipsum dolor sit amet consectetur adipisicing elit.
        </p>
       </li>

       <li class="timeline-item mb-5">
        <h5 class="fw-bold">Casa Voyageur</h5>
        <p class="text-muted mb-2 fw-bold">01 Dec 2022 11:15</p>
        <p class="text-muted">
         Quisque ornare dui nibh, sagittis egestas nisi luctus nec.
        </p>
       </li>
      </ul>
     </div>
     <div class="row">
      <div class="col-lg-6 text-start" style="position: relative;">
       <label for="" class="form-label ms-2" style="color:#80808078;">gare de depart</label>
       <input class="form-control" type="text" name="gare_depart" id="gare_depart" placeholder="Casa voyageur.." autocomplete="off" required>
       <div class="invalid-feedback ms-2">
        veillez remplire la gare de départ.
       </div>
       <div class="rounded-bottom" style="background-color:aliceblue;position:absolute; width: 94%;z-index:100;" id="cities_rst1"></div>
      </div>
      <div class="col-lg-6 text-start" style="position: relative;">
       <label for="" class="form-label ms-2" style="color:#80808078;">gare de distination</label>
       <input class="form-control " type="text" name="gare_distination" id="gare_distination" autocomplete="off" placeholder="Tanger ville..">
       <div class="rounded-bottom" style="background-color:aliceblue;position:absolute; width: 94%;" id="cities_rst2"></div>
      </div>
     </div>
     <div class="p-2 pt-4">
      <button class="btn p-2 w-100" style="background-color:var(--aqua);color:white;border-radius:20px;">Search again</button>
     </div>
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
      <div class="row gy-3 p-3" style="width:100%;overflow:scroll;">
       <div class="px-5 py-3 shadow " style="background-color:white;border-radius:10px;">
        <div class="d-flex align-items-center">
         <div class="d-flex justify-content-between flex-grow-1 px-3">
          <div>
           <p>départ</p>
           <h3>8:30</h3>
           <p>Tanger ville</p>
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
           <p>Casa voyageur</p>
          </div>
         </div>
         <div class=" align-items-center text-center p-4" style="border-left: 2px dotted  #80808078;">
          <h4>1 passager</h4>
          <h5>à partir </h5>
          <span>
           <h4 class="text-danger">219 DH</h4>
          </span>
          <button class="btn text-light px-5 " style="background-color:var(--aqua);border-radius:20px;">Réserver</button>
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
       <!-- YouTrain™2 -->

      </div>
     </div>
    </div>
   </div>
  </div>
 </section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../assets/js/main2.js"></script>

</html>