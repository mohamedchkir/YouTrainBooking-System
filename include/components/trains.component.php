<?php
include_once "../autoloader.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="../../assets/css/style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>

<body>
<div class="container">
   <div class="py-5">
       <form action="../handlers/trainHandler.php" method="post" class="p-lg-5  needs-validation" id="add_train_form" novalidate>
           <div class="row gy-3">
               <div class="col-lg-6 text-start" style="position: relative;">
                   <label for="" class="form-label ms-2" style="color:#80808078;">Nom de train</label>
                   <input class="form-control" type="text" name="nom_train" id="nom_train" placeholder="exemple : train v1.." autocomplete="nope" required>
                   <div class="invalid-feedback ms-2">
                       veillez remplire le nom de train à ajouter.
                   </div>
                   <div class="rounded-bottom" style="background-color:aliceblue;position:absolute; width: 94%;z-index:100;max-height:31vh;overflow:auto;" id="cities_rst1"></div>
               </div>
               <div class="col-lg-6 text-start" style="position: relative;">
                   <label for="" class="form-label ms-2" style="color:#80808078;">La gare</label>
                   <input class="form-control " type="text" name="id_gare" id="id_gare" placeholder="exemple : Gare tanger ville.." autocomplete="false" required >
                   <div class="rounded-bottom" style="background-color:aliceblue;position:absolute; width: 94%;max-height:31vh;overflow:auto;" id="cities_rst2"></div>
                   <input type="hidden" value="" name="id_gare" id="id_holder">
               </div>
               <div class="col-lg-6 text-start">
                   <label for="" class="form-label ms-2" style="color:#80808078;">Status</label>
                   <select class="form-select" aria-label="Default select example" name="status" required>
                       <option value="" selected>choisissez le status de train à ajouter</option>
                       <option value="1" >disponible</option>
                       <option value="2" >pas encore disponible</option>
                   </select>
                   <div class="invalid-feedback ms-2">
                       veillez remplire la date de départ.
                   </div>
               </div>
               <div class="col-lg-6 text-start">
                   <label for="" class="form-label ms-2" style="color:#80808078;">Capacité</label>
                   <input class="form-control" type="number" name="capacite" placeholder="exemple 52 place" required min="1">
               </div>
               <div class="text-start">
                   <button type="submit" class="btn text-light px-5" style="background-color:var(--aqua);border-radius: 20px;" name="save-train">save</button>
               </div>
           </div>
       </form>
   </div>

                <div class=' alert alert-dismissible fade show' role='alert' style='display: none;background-color: #dff9ff' id="train_msg_alert">
                 <div class="d-flex justify-content-between">
                     <div >
                         <strong class="d-inline">Success !</strong>
                         <p class="d-inline" id='msg-label'></p>
                     </div>
                     <button type='button' class='close btn btn-transparent p-0' data-bs-dismiss='alert' aria-label='Close'>
                         <span aria-hidden='true'>×</span>
                     </button>
                 </div>
                </div>";

    <table id="example" class="table table-striped mt-5" style='width:100%'>
        <thead>
        <tr>
            <th># ID</th>
            <th>Name </th>
            <th>Gare</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>

            <?php
            $trainCtr = new TrainController();
            $trains = $trainCtr->getAllTrains();
            //echo "<h1>".count($trains)."</h1>";
            foreach ($trains as $t){
                echo "
                 <tr>
                    <td>".$t['id']."</td>
                    <td contenteditable='true' class='changeable' id='nom_".$t['id']."'>".$t['nom']."</td>
                    <td>".$t['gare']."</td>
                    <td>".$t['status']."</td>
                    <td class='text-center'>
                        <button class='btn btn-outline-danger' onclick='deleteTran(".$t['id'].")'><i class='bi bi-trash'></i></button>
                    </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</div>
</body>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<script>
    document.forms.namedItem("add_train_form").addEventListener('submit',function (e){
        let gare_entred = $("#id_holder").val();
        if(gare_entred==""){
            e.preventDefault();
            alert("invalid gare identiant");
            return;
        }
        //alert(isGareExist(gare_entred))
        isGareExist(gare_entred,"../handlers/garehandler.php").then(data=>{
            if(!data){
                e.preventDefault();
                alert("invalid gare identiant");
            }
        })

    })
</script>
<script src="../../assets/js/main2.js"></script>
</html>