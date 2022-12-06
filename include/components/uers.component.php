<?php
include_once('../../class/UserController.class.php');
$test = new UserController();
// var_dump($test->getVoyage());
$res = $test->getUser();
// var_dump($res)

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
<div class="container my-5">
    <h5 class="h5 mb-5">Manage Users Status</h5>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Image</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Tel</th>
            <th scope="col">Compte</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Action</th>
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
                <td>'.$t['id'].'</td>
                <td><img class="rounded-circle" src=' alt="user photo" style="width: 80px;height: 80px"></td>
                <td>'.$t['nom'].'</td>
                <td>'.$t['prenom'].'</td>
                <td>'.$t['tel'].'</td>
                <td>'.$t['compte_Bancaire'].'</td>
                <td>'.$t['email'].'</td>
                <td>'.$t['password'].'</td>
                <td>
                  <button type="submit" class="btn btn-outline-primary"data-bs-toggle="modal" data-bs-target="#AddVoyage" onclick="edit('.$t['id'].')"><i class="fa-regular fa-pen-to-square"></i></button>
                </td>
              </tr>';
          }
        ?>
        </tbody>
    </table>
</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- main -->
<script src="../assets/js/main3.js"></script>
<script src="../assets/js/main2.js"></script>
<!-- dataTable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../assets/js/datatable/code.js"></script>
<!-- Font Awesome JS -->
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</html>