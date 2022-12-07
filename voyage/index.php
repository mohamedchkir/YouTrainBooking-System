<?php
include_once('../class/VoyageController.class.php');
$test = new VoyageController();
// var_dump($test->getVoyage());
$res = $test->getVoyage();


?>
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
  <link rel="stylesheet" href="../assets/css/style3.css">
  <!-- Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
  <section style="height:94vh ;" class="container">
    <div class="w-75 mb-5 row">
      <div class="col-8">
        <form action="../include/handlers/voyagehandler.php" method="POST">
          <div>
            <p class="aqua" style="font-weight: bold; color:#47B5FF;">Voyage Aller</p>
          </div>
          <div class="form-group">
            <label for="status" class="col-form-label">Status:</label>
            <select name="status" id="status" class="form-select">
              <!-- <option >Open this select menu</option> -->
              <option selected value="1">disponible</option>
              <option value="2">non disponible</option>
            </select>
          </div>
          <div class="form-group">
            <label for="duree" class="col-form-label">duree:</label>
            <input type="number" class="form-control" id="duree" name="duree">
          </div>
          <div class="form-group">
            <label for="gare_depart" class="col-form-label">gare depart:</label>
            <select name="gare_depart" id="gare_depart" class="form-select">
              <option selected>Open this select menu</option>
              <option value="1">Agadir</option>
              <option value="2">Casa</option>
            </select>
          </div>
          <div class="form-group">
            <label for="gare_arrivee" class="col-form-label">gare arrivee:</label>
            <select name="gare_arrivee" id="gare_arrivee" class="form-select">
              <option selected>Open this select menu</option>
              <option value="1">Agadir</option>
              <option value="2">Casa</option>
            </select>
          </div>
          <div class="form-group">
            <label for="prix" class="col-form-label">prix:</label>
            <input type="number" class="form-control" id="duree" name="prix" step="0.1">
          </div>
          <div class="form-group">
            <label for="id_train" class="col-form-label">Train:</label>
            <select name="id_train" id="id_train" class="form-select">
              <option selected>Open this select menu</option>
              <option value="1">TVG</option>
              <option value="2">ONCF</option>
            </select>
          </div>
          <div class="form-group">
            <label for="datetime" class="col-form-label">datetime:</label>
            <input type="datetime-local" class="form-control" id="datetime" name="datetime">
          </div>
          <div class="mt-3 d-flex justify-content-center">
            <button type="submit" class="btn text-light px-5" style="background-color:var(--aqua);border-radius: 20px;" name="saveVoyage">Save</button>
          </div>
        </form>
      </div>
      <div class="col-4">
        <div class="w-100">
          <form action="" method="POST">
            <div>
              <p class="aqua" style="font-weight: bold; color:#47B5FF;">Voyage Roteur</p>
            </div>
            <div class="form-group">
              <label for="status" class="col-form-label">gare depart:</label>
              <select name="status" id="status" class="form-select" disabled>
                <option selected>Open this select menu</option>
                <option value="1">disponible</option>
                <option value="0">non disponible</option>
              </select>

              <label for="gare_depart" class="col-form-label">gare arrivee:</label>
              <select name="gare_depart" id="gare_depart" class="form-select" disabled>
                <option selected>Open this select menu</option>
                <option value="">Agadir</option>
                <option value="">Casa</option>
              </select>
            </div>
          </form>
        </div>
      </div>
    </div>
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
    <table id="example" class="table table-striped" style="width:100%">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">status</th>
          <th scope="col">duree</th>
          <th scope="col">gare_depart</th>
          <th scope="col">gare_arrivee</th>
          <th scope="col">prix</th>
          <th scope="col">train</th>
          <th scope="col">date</th>
          <th scope="col">actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($res as $t) {
          // if($t['status']==1){
          //   $t['status']="disponible";
          // }else{
          //   $t['status']="Non disponible";
          // }
          echo
          '<tr id="' . $t['id'] . '">
                <td data="' . $t['unique_id'] . '">' . $t['id'] . '</td>
                <td>' . $t['status'] . '</td>
                <td>' . $t['duree'] . '</td>
                <td>' . $t['gare_depart'] . '</td>
                <td>' . $t['gare_arrivee'] . '</td>
                <td>' . $t['prix'] . '</td>
                <td>' . $t['id_train'] . '</td>
                <td>' . $t['date'] . '</td>
                <td>
                  <button type="submit" class="btn btn-outline-primary"data-bs-toggle="modal" data-bs-target="#AddVoyage" onclick="editGare(' . $t['id'] . ')"><i class="fa-regular fa-pen-to-square"></i></button>
                  <a type="submit" href="../include/handlers/voyagehandler.php?id=' . $t['id'] . '" class="btn btn-outline-danger" name="deleteVoyage"><i class="fa-solid fa-trash"></i></a>
                </td>
              </tr>';
        }
        ?>
      </tbody>
    </table>
  </section>
  <!-- Modal -->
  <div class="modal fade" id="AddVoyage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Edit Voyage</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="../include/handlers/voyagehandler.php" method="POST">
            <input type="hidden" id="md_id_tr" name="md_id_tr" value="">
            <input type="hidden" id="md_unique_id" name="md_unique_id" value="">
            <div class="form-group">
              <label for="status" class="col-form-label">Status:</label>
              <select name="status" id="md_status" class="form-select">
                <option selected>Open this select menu</option>
                <option value="1">disponible</option>
                <option value="2">non disponible</option>
              </select>
            </div>
            <div class="form-group">
              <label for="duree" class="col-form-label">duree:</label>
              <input type="number" class="form-control" id="md_duree" name="duree">
            </div>
            <div class="form-group">
              <label for="gare_depart" class="col-form-label">gare depart:</label>
              <select name="gare_depart" id="md_gare_depart" class="form-select">
                <option selected>Open this select menu</option>
                <option value="1">Agadir</option>
                <option value="2">Casa</option>
              </select>
            </div>
            <div class="form-group">
              <label for="gare_arrivee" class="col-form-label">gare arrivee:</label>
              <select name="gare_arrivee" id="md_gare_arrivee" class="form-select">
                <option selected>Open this select menu</option>
                <option value="1">Agadir</option>
                <option value="2">Casa</option>
              </select>
            </div>
            <div class="form-group">
              <label for="prix" class="col-form-label">prix:</label>
              <input type="number" class="form-control" id="md_prix" name="prix">
            </div>
            <div class="form-group">
              <label for="id_train" class="col-form-label">Train:</label>
              <select name="id_train" id="md_id_train" class="form-select">
                <option selected>Open this select menu</option>
                <option value="1">TVG</option>
                <option value="2">ONCF</option>
              </select>
            </div>
            <div class="form-group">
              <label for="datetime" class="col-form-label">datetime:</label>
              <input type="datetime-local" class="form-control" id="md_datetime" name="datetime">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="editVoyage">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- main -->
<script src="../assets/js/main3.js"></script>
<!-- dataTable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/js/datatable/code.js"></script>
<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</html>