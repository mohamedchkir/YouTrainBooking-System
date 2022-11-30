<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="dist/css/date-time-picker-component.min.css" rel="stylesheet" />
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
            <nav class="navbar navbar-expand-lg navbar-light bg-gradient  ">
                <div class="container-fluid d-flex justify-content-between">
                    <a class="navbar-brand p-0 " href="#">
                        <img src="assets/img/YouTrain™2.png" alt="Youtrain logo" style="width: 100px">
                    </a>
                    <button onclick="makeaMargin(this)" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                                <a class="nav-link active py-0 px-3 " id="login" aria-current="page" href="#" style="font-weight: 500;">
                                    <span>Log in</span>
                                </a>
                            </li>
                            <li class="vr" style="background-color: var(--dark-blue);width: 1px ;"></li>
                            <li class="nav-item">
                                <a class="nav-link active py-0 px-3" aria-current="page" href="#" id="sign_up">
                                    <span style="background-color: var(--aqua);color: white;padding: 7px 25px;border-radius: 25px;font-weight: 500;">Sign up</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

        </header>
        <section id="home" style="height: 90vh">
            <div class="row h-100">
                <div class="col ">
                    <div class="d-flex justify-content-end ">
                        <div class="d-flex align-items-center justify-content-center p-5 text-light  " style="background-color: #0000003b;height: 90vh">
                            <div class="">
                                <p><span style="background-color: var(--aqua);padding: 10px 15px;border-radius: 20px">Hello Travler,</span></p>
                                <h3 class="h1">
                                    Réservez online et profitez <br> des meilleurs tarifs !
                                </h3>
                                <div class="d-flex justify-content-center mt-5">
                                    <a href="#reservation" class="btn btn-outline-light px-5" style="border-radius: 20px;scroll-behavior: smooth;">
                                        <i class="bi bi-ticket-perforated"></i>
                                        J'achete mon billet
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <section id="reservation" class="pt-5">
        <div class="container p-5 text-center">
            <h3 class="aqua" style="font-weight: bold;">
                Réservez online et profitez
                des meilleurs tarifs !
            </h3>
            <p class="text-grey">Explore the world with us </p>

            <form action="" class="p-lg-5 needs-validation" novalidate>
                <div class="row gy-3">
                    <div class="col-lg-6 text-start">
                        <label for="" class="form-label ms-2" style="color:#80808078;">gare de depart</label>
                        <input class="form-control" type="text" name="gare_depart" id="gare_depart" placeholder="Casa voyageur.." required>
                        <div class="invalid-feedback ms-2">
                            veillez remplire la gare de départ.
                        </div>
                        <div id="cities"></div>
                    </div>
                    <div class="col-lg-6 text-start">
                        <label for="" class="form-label ms-2" style="color:#80808078;">gare de distination (optionel)</label>
                        <input class="form-control " type="text" name="gare_distination" id="gare_distination" placeholder="Tanger ville..">
                    </div>
                    <div class="col-lg-6 text-start">
                        <label for="" class="form-label ms-2" style="color:#80808078;">date de départ</label>
                        <input class="form-control" type="datetime-local" placeholder="date de depart" required>
                        <div class="invalid-feedback ms-2">
                            veillez remplire la date de départ.
                        </div>
                    </div>
                    <div class="col-lg-6 text-start">
                        <label for="" class="form-label ms-2" style="color:#80808078;">date de retour (optionel)</label>
                        <input class="form-control" type="datetime-local" placeholder="date de distination">
                    </div>
                    <div class="text-start">
                        <button type="submit" class="btn text-light px-5" style="background-color:var(--aqua);border-radius: 20px;">cherchez</button>
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
                    <div class="carousel-img" style="background-image: url('assets/img/1.png')"></div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img" style="background-image: url('assets/img/2.png')"></div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-img" style="background-image: url('assets/img/3.png')"></div>
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
<script src="assets/js/main2.js"></script>


</html>