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
 <style></style>
</head>

<body>
<section style="height:94vh ;" class="bg-light container">
  <div class="row">
    <div class="col">
    <div class="w-50 mb-5">
      <form action="../include/handlers/voyagehandler.php" method="POST">
          <div>
              <p>Voyage Aller</p>
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
            <input type="number" class="form-control" id="duree" name="prix">
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
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" name="saveVoyage">Save</button>
          </div>
        </form>
    </div>
    </div>
    <div class="col">
    <div class="w-50 auto d-flex align-items-center">
      <form action="" method="POST">
        <div>
          <p>Voyage Roteur</p>
        </div>
          <div class="form-group">
            <label for="status" class="col-form-label">gare depart:</label>
            <select name="status" id="status" class="form-select">
              <option selected>Open this select menu</option>
              <option value="1">disponible</option>
              <option value="0">non disponible</option>
            </select>

            <label for="gare_depart" class="col-form-label">gare arrivee:</label>
            <select name="gare_depart" id="gare_depart" class="form-select">
              <option selected>Open this select menu</option>
              <option value="">Agadir</option>
              <option value="">Casa</option>
            </select>
          </div>
          <!-- <div class="form-group">
            
          </div> -->
        </form>
    </div>
    </div>

  </div>
    
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
          <th scope="col">unique_id</th>
          <th scope="col">actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($res as $t) {
          if($t['status']==1){
            $t['status']="disponible";
          }else{
            $t['status']="Non disponible";
          }
          echo 
              '<tr>
                <td>'.$t['id'].'</td>
                <td>'.$t['status'].'</td>
                <td>'.$t['duree'].'h</td>
                <td>'.$t['gare_depart'].'</td>
                <td>'.$t['gare_arrivee'].'</td>
                <td>'.$t['prix'].'</td>
                <td>'.$t['id_train'].'</td>
                <td>'.$t['date'].'</td>
                <td>'.$t['unique_id'].'</td>
                <td>
                  <input type="submit" class="btn btn-primary" value="edit" data-bs-toggle="modal" data-bs-target="#AddVoyage" onclick="index.php"/>
                  <input type="submit" class="btn btn-danger" value="delete">
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
        <h5 class="modal-title" id="staticBackdropLabel">Add Voyage</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="../include/handlers/voyagehandler.php" method="POST">
          <div class="form-group">
            <label for="status" class="col-form-label">Status:</label>
            <select name="status" id="status" class="form-select">
              <option selected>Open this select menu</option>
              <option value="1">disponible</option>
              <option value="0">non disponible</option>
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
              <option value="">Agadir</option>
              <option value="">Casa</option>
            </select>
          </div>
          <div class="form-group">
            <label for="gare_arrivee" class="col-form-label">gare arrivee:</label>
            <select name="gare_arrivee" id="gare_arrivee" class="form-select">
              <option selected>Open this select menu</option>
              <option value="">Agadir</option>
              <option value="">Casa</option>
            </select>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="saveVoyage">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="../assets/js/main3.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/js/datatable/code.js"></script>

</html>