<?php
include_once("../class/GareController.class.php");
$gare = new GareController();
$reslt = $gare->getAllGare();

?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouTrain™</title> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css"> -->
    <!--Boostrap Icons CDN -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"> -->
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style3.css">
    <!-- Font Awesome-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->


<!-- 
</head>

<body> -->

    <form action="../include/handlers/garehandler.php" method="POST">
        <div class="container mt-5">

            <div class="row mb-5">
                <div class="col-lg-6 text-start" style="position: relative;">
                    <label for="" class="form-label ms-2">NOM DU GARE</label>
                    <input class="form-control" type="text" name="gare_name" id="name" placeholder="Entrer le nom du Gare" autocomplete="off">
                </div>
                <div class="col-lg-6 text-start" style="position: relative;">
                    <label for="" class="form-label ms-2">VILLE</label>
                    <input class="form-control " type="text" name="gare_ville" id="ville" autocomplete="off" placeholder="Entrer le nom du Ville">
                    <div id="gareres" style="max-height:33vh ;overflow:auto;position:absolute;background-color:white;width:100%;z-index:100;"></div>
                    <input type="hidden" name="ville" value="">
                </div>

                <div class="mt-2 d-flex justify-content-center">
                    <button type="submit" class="btn text-light px-5" style="background-color:var(--aqua);border-radius: 20px;" name="saveGare">Add Gare</button>
                </div>
            </div>
    </form>

    <?php if (isset($_SESSION['message'])) :  ?>
      <div class="alert alert-success alert-dismissible fade show w-100">
        <strong>successfully!</strong>
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif ?>
    <?php if (isset($_SESSION['error'])) :  ?>
      <div class="alert alert-danger alert-dismissible fade show w-100">
        <strong>Erreur!</strong>
        <?php
        echo $_SESSION['error'];
        unset($_SESSION['error']);
        ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      </div>
    <?php endif ?>

    <section>

        <table id="example" class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>GareName</th>
                    <th>CityName</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($reslt as $g) {
                    echo
                    '<tr id="' . $g['id'] . '">
                            <td>' . $g['id'] . '</td>
                            <td>' . $g['nom'] . '</td>
                            <td ville="' . $g['id_Ville'] . '">' . $g['nameVille'] . '</td>
                            <td class="d-flex justify-content-center">
                            <button type="button" class="btn btn-outline-primary mx-2" data-bs-toggle="modal" onclick="editGare(' . $g['id'] . ')" data-bs-target="#AddGare"><i class="fa-regular fa-pen-to-square"></i></button>
                            <form action="../include/handlers/garehandler.php" method="POST">   
                                <input type="hidden" name="id_gare" value="' . $g['id'] . '">
                                <button type="submit" class="btn btn-outline-danger" name="deleteGare"><i class="fa-solid fa-trash"></i></button>
                            </form>
                            </td>
                        </tr>';
                }
                ?>
            </tbody>
        </table>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="AddGare" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel"> <strong>Edit Gare</strong> </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="../include/handlers/garehandler.php" method="POST">
                        <input type="hidden" id="id_gare" name="id_gare" value="">
                        <div class="form-group">
                            <div class="col-lg-6 text-start" style="position: relative;">
                                <label for="" class="form-label ms-2">NOM DU GARE</label>
                                <input class="form-control" type="text" name="gare_name" id="gare_name" placeholder="Entrer le nom du Gare" autocomplete="off">
                            </div>
                            <div class="col-lg-6 text-start mt-2" style="position: relative;">
                                <label for="" class="form-label ms-2">VILLE</label>
                                <input class="form-control " type="text" name="gareville" id="gare_ville" autocomplete="on" placeholder="Entrer le nom du Ville">
                                <div id="md_gareres" style="max-height:33vh ;overflow:auto;position:absolute;background-color:white;width:100%;z-index:100;"></div>
                                <input type="hidden" name="gare_ville" id="id_ville" value="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="editGare">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


<!-- </body>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<!-- main -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

<script src="../assets/js/main1.js"></script>
<script src="../assets/js/main2.js"></script>

</html> -->