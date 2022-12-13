<?php
  include_once('../class/VoyageController.class.php');
  include_once('../class/TrainController.class.php');
    $voyage = new VoyageController();
    $train = new TrainController();
    $options = $train->getAllTrains();
    // var_dump($options);
    // die;
    $res = $voyage->getVoyage();
    // var_dump($res);
    // exit();
    


?>
<!-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YouTrain Booking</title> -->
  <!--Boostrap Icons CDN -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="../assets/css/style3.css"> -->
  <!-- Font Awesome-->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body> -->
  <section class="container">
      <form action="../include/handlers/voyagehandler.php" class="needs-validation" method="POST" novalidate id="voyage">
          <div class="row g-3">
            <div class="col-sm">
              <p class="aqua" style="font-weight: bold; color:#47B5FF;">Voyage Aller</p>
              <div class="form-group">
                <label for="status" class="col-form-label">Status:</label>
                <select name="status" id="status" class="form-select" required>
                  <option selected>Open this select menu</option>
                  <option value="1">disponible</option>
                  <option value="2">non disponible</option>
                </select>
              </div>
              <div class="form-group">
                <label for="prix" class="col-form-label">prix:</label>
                <input type="number" class="form-control" id="prix" name="prix" step="0.1" required>
              </div>
              <div class="form-group">
              <label for="datetime" class="col-form-label">datetime:</label>
                <input type="datetime-local" class="form-control" id="datetime" name="datetime" required>
              </div>
              <div class="form-group">
              <label for="Frequence" class="col-form-label">Frequence:</label>
                <select name="Frequence" id="Frequence" class="form-select" required>
                  <option selected>Open this select menu</option>
                  <option value="1">Day</option>
                  <option value="2">week</option>
                </select>
              </div>
            </div>
            <div class="col-sm">
              <div class="form-group" style="margin-top: 40px;">
                <label for="duree" class="col-form-label">duree:</label>
                <input type="number" class="form-control" id="duree" name="duree" required>
              </div>
              <div class="form-group">
                <label for="gare_depart" class="col-form-label">gare depart:</label>
                <input type="text" name="gare_depart"  id="gare_depart" class="form-control" required>
                <div id="res" style="max-height:33vh ;overflow:auto;position:absolute;background-color:white;width:100%;z-index:100;"></div>
                <input type="hidden" id="id_gare_depart" name="id_gare_depart" value="">
              </div>
              <div class="form-group">
                <label for="gare_arrivee" class="col-form-label">gare arrivee:</label>
                <input type="text" name="gare_arrivee"  id="gare_arrivee" class="form-control" required>
                <div id="res2" style="max-height:33vh ;overflow:auto;position:absolute;background-color:white;width:100%;z-index:100;"></div>
                <input type="hidden" id="id_gare_arrivee" name="id_gare_arrivee" value="">
              </div>
              <div class="form-group">
              <label for="id_train" class="col-form-label">Train:</label>
                <select name="id_train" id="id_train" class="form-select" required>
                  <option selected>Open this select menu</option>
                  <?php foreach ($options as $opt) {
                    echo '<option value="'.$opt['id'].'">'.$opt['nom'].'</option>';
                  }?>
                </select>
              </div>
            </div>
            <div class="col-sm">
              <p class="aqua" style="font-weight: bold; color:#47B5FF;">Voyage Roteur</p>
              <div class="form-group">
                <label for="status" class="col-form-label">gare depart:</label>
                <input type="text" class="form-control" id="gare_depart_roteur" disabled>
                <label for="gare_depart" class="col-form-label">gare arrivee:</label>
                <input type="text" class="form-control" id="gare_arrivee_roteur" disabled>
              </div>
            </div>
          </div>
          <div class="mt-3 d-flex justify-content-center mb-3">
            <button type="submit" class="btn text-light px-5 bg-primary" style="background-color:var(--aqua);border-radius: 20px;" name="saveVoyage">Save</button>
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
              '<tr id="'.$t['id'].'">
                <td data="'.$t['unique_id'].'">'.$t['id'].'</td>
                <td data="'.$t['status'].'">'.$t['statusnom'].'</td>
                <td>'.$t['duree'].'</td>
                <td data="'.$t['gare_depart'].'">'.$t['garedepart'].'</td>
                <td data="'.$t['gare_arrivee'].'">'.$t['garearrivee'].'</td>
                <td>'.$t['prix'].'</td>
                <td data="'.$t['id_train'].'">'.$t['train'].'</td>
                <td>'.$t['date'].'</td>
                <td>
                  <button type="submit" class="btn btn-outline-primary"data-bs-toggle="modal" data-bs-target="#AddVoyage" onclick="edit('.$t['id'].')"><i class="fa-regular fa-pen-to-square"></i></button>
                  <form action="../include/handlers/voyagehandler.php" method="POST">
                  <input type="hidden" id="md_id_tr" name="md_id_tr" value="'.$t['unique_id'].'">
                    <button type="submit" class="btn btn-outline-danger" name="deleteVoyage"><i class="fa-solid fa-trash"></i></button>
                  </form>
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
        <form action="../include/handlers/voyagehandler.php" method="POST" class="needs-validation" method="POST" novalidate>
          <input type="hidden" id="md_id" name="md_id_tr" value="">
          <input type="hidden" id="md_unique_id" name="md_unique_id" value="">
        <div class="form-group">
            <label for="status" class="col-form-label">Status:</label>
            <select name="md_status" id="md_status" class="form-select" required>
              <option selected>Open this select menu</option>
              <option  value="1">disponible</option>
              <option value="2">non disponible</option>
            </select>
          </div>
          <div class="form-group">
            <label for="duree" class="col-form-label">duree:</label>
            <input type="number" class="form-control" id="md_duree" name="md_duree" required>
          </div>
          <div class="form-group">
            <label for="gare_depart" class="col-form-label">gare depart:</label>
            <input type="text" name="" class="form-control" id="md_gare_depart">
            <div id="md_res" style="background-color:aliceblue;position:absolute; width: 94%;max-height:31vh;overflow:auto;"></div>
            <input type="hidden" name="md_gare_depart" id="id_md_gare_depart" value="">
          </div>
          <div class="form-group">
            <label for="gare_arrivee" class="col-form-label">gare arrivee:</label>
            <input type="text" name="" class="form-control" id="md_gare_arrivee">
            <div id="md_res2" style="background-color:aliceblue;position:absolute; width: 94%;max-height:31vh;overflow:auto;"></div>
            <input type="hidden" name="md_gare_arrivee" id="id_md_gare_arrivee" value="">
          </div>
          <div class="form-group">
            <label for="prix" class="col-form-label">prix:</label>
            <input type="number" class="form-control" id="md_prix" name="md_prix" required>
          </div>
          <div class="form-group">
            <label for="id_train" class="col-form-label">Train:</label>
            <select name="md_id_train" id="md_id_train" class="form-select" required>
              <option selected>Open this select menu</option>
              <?php foreach ($options as $opt) {
                echo '<option value="'.$opt['id'].'">'.$opt['nom'].'</option>';
              }?>
            </select>
          </div>
          <div class="form-group">
            <label for="datetime" class="col-form-label">datetime:</label>
            <input type="datetime-local" class="form-control" id="md_datetime" name="md_datetime" required>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="editVoyage">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- main -->
<script src="../assets/js/main3.js"></script>
<script src="../assets/js/main2.js"></script>
<script src="../assets/js/main1.js"></script>
<script src="../assets/js/validation.js"></script>
<!-- dataTable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/js/datatable/code.js"></script>
<!-- Font Awesome JS -->
<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->
<!-- parsley -->

<script>
   document.forms.namedItem("voyage").addEventListener('submit',function (e){
        let gareDepart= $("#id_gare_depart").val();
        let gareArrivee= $("#id_gare_arrivee").val();
        if(gareDepart=="" && gareArrivee==""){
            e.preventDefault();
            alert("invalid gare identiant");
            return;
        }
        isGareExist(gareDepart,"./include/handlers/voyagehandler.php").then(data=>{
            if(!data){
                e.preventDefault();
                alert("invalid gare identiant");
            }
        })
    });
    
    let train = document.querySelector("#id_train");
    let duree = document.querySelector("#duree");
    let date = document.querySelector("#datetime");
    let fr = document.querySelector("#Frequence");
    train.addEventListener("change",function(){
      let d=date.value;
      let duree=document.forms.namedItem("voyage").duree.value;
      let i=train.value;
      let f=fr.value;
      //console.log(i,duree,f)
      $.post("../include/handlers/voyagehandler.php",
      {
        isTrainAvailable:true,
        datetime:d,
        trainId: i,
        duree:duree,
        Frequence:f
      },
      function(data,status){
        console.log(data);
      }
      )
    });
</script>
</html>