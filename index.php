<!doctype html>
<html lang="en">

<head>
 <!-- Required meta tags -->
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">

 <!--Boostrap Icons CDN -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
 <!-- Bootstrap CSS -->
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="assets/css/style2.css">
 <title>YouTrain™</title>
</head>

<body>
 <div id="homeImg">
  <header>
   <nav class="navbar navbar-expand-lg nav-light bg-gradient shadow">
    <div class="container-fluid d-flex justify-content-between">
     <a class="navbar-brand p-0" href="#">
      <img src="./asset/img/YouTrain™2.png" alt="Youtrain logo" style="width: 100px">
     </a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
      <ul class="navbar-nav mb-2 mb-lg-0">
       <!--<li class="nav-item">
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
                           </li>-->
       <li class="nav-item">
        <a class="nav-link active py-0 px-3" aria-current="page" href="#">
         <span>Log in</span>
        </a>
       </li>
       <li class="vr" style="background-color: var(--dark-blue);width: 1px ;"></li>
       <li class="nav-item">
        <a class="nav-link active py-0 px-3" aria-current="page" href="#" style="">
         <span style="background-color: var(--aqua);color: white;padding: 7px 25px;border-radius: 25px;">Sign up</span>
        </a>
       </li>
      </ul>
     </div>
    </div>
   </nav>

  </header>
  <section id="home" style="height: 90vh">
   <div class="row h-100">
    <div class="col">
     <div class="d-flex justify-content-end">
      <div class="d-flex align-items-center justify-content-center p-5 text-light" style="background-color: #00000094;height: 90vh">
       <div>
        <p><span style="background-color: var(--aqua);padding: 10px 15px;border-radius: 20px">Hello Travler,</span></p>
        <h3 class="h1">
         Réservez online et profitez <br> des meilleurs tarifs !
        </h3>
        <div class="d-flex justify-content-center mt-5">
         <button class="btn btn-outline-light px-5" style="border-radius: 20px">
          <i class="bi bi-ticket-perforated"></i>
          J'achete mon billet
         </button>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </section>

 </div>
 <section id="reservation">
  <div class="container p-5">
   <h3>
    Réservez online et profitez
    des meilleurs tarifs !
   </h3>
   <p class="text-grey">Explore the world with us </p>

   <form action="">
    <div class="row gy-3">
     <div class="col-lg-6">
      <input class="form-control" type="text" placeholder="gare de depart">
     </div>
     <div class="col-lg-6">
      <input class="form-control" type="text" placeholder="gare de distination">
     </div>
     <div class="col-lg-6">
      <input class="form-control" type="datetime-local" placeholder="date de depart">
     </div>
     <div class="col-lg-6">
      <input class="form-control" type="datetime-local" placeholder="date de distination">
     </div>
    </div>
   </form>
  </div>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
   <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
   </div>
   <div class="carousel-inner">
    <div class="carousel-item active">
     <div class="carousel-img" style="background-image: url('assets/img/home.jpg')"></div>
    </div>
    <div class="carousel-item">
     <div class="carousel-img" style="background-image: url('assets/img/home2.jpg')"></div>
    </div>
    <div class="carousel-item">
     <div class="carousel-img" style="background-image: url('asset/img/YouTrain™.png')"></div>
    </div>
   </div>
   <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
   </button>
   <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
   </button>
  </div>
 </section>

 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
 <script>
  const carousel = new bootstrap.Carousel('#carouselExampleIndicators');
 </script>
</body>

</html>