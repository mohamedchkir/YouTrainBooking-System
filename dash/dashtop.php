<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>YouTrain™</title>

    <!-- Custom fonts for this template -->
    <script src="https://kit.fontawesome.com/f57667c685.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="../assets/css/style1.css" rel="stylesheet">
    <link href="../assets/css/style2.css" rel="stylesheet">
    <link href="../assets/css/style3.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar accordion" id="accordionSidebar" style="background-color: #06283D;">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand mb-5 ">
                <img style="width: 70%;" src="../assets/img/YouTrainTM_white.png" alt="">
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../dash/index.php?page=gare" style="color: white;">
                    <i style="color: inherit;" class="px-3 fa-solid fa-house"></i>
                    <span style="color: inherit;">Gares</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a style="color: white;" class="nav-link" href="../dash/index.php?page=train">
                    <i style="color: inherit;" class="px-3 fa-solid fa-train"></i>
                    <span style="color: inherit;">Train</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="../dash/index.php?page=voyage" style="color: white;">
                    <i class="px-3 fa-solid fa-route" style="color: inherit;"></i>
                    <span style="color:inherit;">Voyages</span></a>
            </li>

            <!-- Nav Item - Spec -->
            <li class="nav-item">
                <a class="nav-link" href="../dash/index.php?page=allUsers" style="color: white;">
                    <i class="px-3 fa-solid fa-people-group" style="color: white;"></i>
                    <span style="color: white;">gestion des roles</span></a>
            </li>
            <!-- Nav Item - Spec -->
            <li class="nav-item">
                <a class="nav-link" href="../dash/index.php?page=satistique" style="color: white;">
                    <i style="color: white;" class="px-3 fas fa-chart-bar"></i>
                    <span style="color: white;">statistiques</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" style="color: #06283D;" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn" style="background-color: #06283D;" type="button">
                                    <i class="fas fa-search fa-sm text-white"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-white small">UserName</span>
                                <img class="img-profile rounded-circle" src="../assets/img/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../index.php">
                                    <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Home
                                </a>
                                <a class="dropdown-item" href="../dash/index.php?page=profil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="../include/Logout.inc.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div id="content" class="w-100">
                        <?php 
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            if ($page == "profil") {
                                include_once('../include/components/EditProfil.component.php');
                            }elseif($page == "gare"){
                                include_once('../gare/index.php');
                            }elseif($page == "voyage"){
                                include_once('../voyage/index.php');
                            }elseif($page == "allUsers"){
                                include_once('../include/components/uers.component.php');
                            }elseif($page == "satistique"){
                                include_once('../include/components/statistique.php');
                            }elseif($page == "train"){
                                include_once('../include/components/trains.component.php');
                            }
                        }else{
                            // page default
                        include_once('../voyage/index.php');
                        }
                        ?>
                    </div>
                </div>
            </div>