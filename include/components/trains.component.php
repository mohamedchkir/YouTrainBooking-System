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

</head>

<body>
<div class="container">
   <div class="py-5">
       <form action="../handlers/trainHandler.php" method="post" class="p-lg-5  needs-validation" novalidate>
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
                   <input type="hidden" value="" name="id_gare">
               </div>
               <div class="col-lg-6 text-start">
                   <label for="" class="form-label ms-2" style="color:#80808078;">Status</label>
                   <select class="form-select" aria-label="Default select example" name="status" required>
                       <option value="" selected>choisissez le status de train à ajouter</option>
                       <option value="1" >disponible</option>
                       <option value="0" >pas encore disponible</option>
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
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>
                <button class="btn btn-outline-success">edit</button>
                <button class="btn btn-outline-danger">del</button>
            </td>
        </tr>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>
                <button class="btn btn-outline-success">edit</button>
                <button class="btn btn-outline-danger">del</button>
            </td>
        </tr>
        <tr>
            <td>Tiger Nixon</td>
            <td>System Architect</td>
            <td>Edinburgh</td>
            <td>61</td>
            <td>
                <button class="btn btn-outline-success">edit</button>
                <button class="btn btn-outline-danger">del</button>
            </td>
        </tr>
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
<script src="../../assets/js/main2.js"></script>
</html>