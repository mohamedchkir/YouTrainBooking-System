<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png" />
    <meta name="apple-mobile-web-app-title" content="CodePen">
    <link rel="shortcut icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/google/noto-emoji-travel-places/256/42533-train-icon.png" />
    <link rel="mask-icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/google/noto-emoji-travel-places/256/42533-train-icon.png" color="#111" />
    <title> YouTrain</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'>
    <link rel="stylesheet" href="../assets/css/style1.css">



    <script>
        window.console = window.console || function(t) {};
    </script>



    <script>
        if (document.location.search.match(/type=embed/gi)) {
            window.parent.postMessage("resize", "*");
        }
    </script>


</head>


<body>
    <nav class="navbar navbar-expand-lg navbar-light " id="navbar">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-align-left"></i>
            </button>
            <div class="d-flex justify-content-end align-items-center">
                <a class="User nav-link" aria-current="page" href="#">NameUser</a>
                <div class="btn-group">
                    <div type="button" class="dropdown-toggle" data-toggle="dropdown" data-display="static" aria-expanded="false">
                        <a href="#">
                            <img style="width: 40px;" class="rounded-circle" src="../assets/img/user.png" alt="">
                        </a>
                    </div>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left">
                        <button class="dropdown-item" type="button">Edit Profil</button>
                        <button class="dropdown-item" type="button">Settings</button>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="d-flex flex-column mb-3 bg " style=" height: 200px;">
                <div>
                    <ul class="list-unstyled components">
                        <div>
                            <a class="navbar-brand p-2 d-flex justify-content-center" style="width: 100%;" href="#">
                                <img style="width: 60%;" src="../assets/img/YouTrainTM (2).png" alt="">
                            </a>
                        </div>
                        <div class="pt-2 px-2">
                            <h6 class="p-2">Parametres</h6>
                            <li class="border-bottom d-flex align-items-center ">
                                <i class=" px-3 fa-solid fa-house"></i>
                                <a class="w-100" href="#">Gares</a>
                            </li>

                            <li class="border-bottom d-flex align-items-center">
                                <i class=" px-3 fa-solid fa-train"></i>
                                <a class="w-100" href="#">Train</a>
                            </li>
                            <li class="border-bottom d-flex align-items-center">
                                <i class=" px-3 fa-solid fa-map"></i>
                                <a class="w-100" href="#">Villes</a>
                            </li>

                            <h6 class="p-2 pt-5">Gestion des voyages</h6>
                            <li class="border-bottom d-flex align-items-center ">
                                <i class="px-3 fa-solid fa-route"></i>
                                <a class="w-100" href="#">Voyages</a>
                            </li>
                            <h6 class="p-2 pt-5">Gestion des utilisateurs</h6>
                            <li class="border-bottom d-flex align-items-center ">
                                <i class=" px-3 fa-solid fa-people-group"></i>
                                <a class="w-100" href="#">gestion des roles</a>
                            </li>
                        </div>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content">
        </div>
    </div>




    <script src="../assets/js/main1.js"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"772aaf290cd10420","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>


</body>

</html>