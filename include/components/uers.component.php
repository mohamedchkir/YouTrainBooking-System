<?php
include_once('../class/UserController.class.php');
$test = new UserController();
$res = $test->getUser();

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
<link rel="stylesheet" href="../../assets/css/style3.css">
    <!-- Font Awesome-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body> -->
<div class="container my-5">
  <?php if(isset($_SESSION['message'])):  ?>
        <div class="alert alert-success alert-dismissible fade show w-100">
            <strong>successfully!</strong>
            <?php 
                echo $_SESSION['message']; 
                unset($_SESSION['message']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif ?>
    <?php if(isset($_SESSION['error'])):  ?>
        <div class="alert alert-danger alert-dismissible fade show w-100">
            <strong>Erreur!</strong>
            <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
            ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif ?>
    <h5 class="h5 mb-5">Manage Users Status</h5>

    <table id="example" class="table table-striped" style="width:100%">
        <thead>
        <tr>
            <th scope="col" class="text-center">#ID</th>
            <th scope="col" class="text-center">Image</th>
            <th scope="col" class="text-center">Nom</th>
            <th scope="col" class="text-center">Prenom</th>
            <th scope="col" class="text-center">Tel</th>
            <th scope="col" class="text-center">Compte</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Password</th>
            <th scope="col" class="text-center">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($res as $t) {
          $access;$action;
          if($t['role']==0){
            $access="Pending";
            $action ="<button class='btn btn-sm btn-outline-success' type='submit' name='accept'>Give access</button>";
          }else{
            $access="Approved" ;
            $action="<button class='btn btn-sm btn-outline-danger text-nowrap' type='submit' name='deny'>Remove Acess</button>";
          }
          echo 
              '<tr id="'.$t['id'].'" class="align-items-center">
                <td class="text-center">'.$t['id'].'</td>
                <td><img class="rounded-circle" src="../../assets/img/1.png" alt="user photo" style="width: 50px;height: 50px"></td>
                <td class="text-center">'.$t['nom'].'</td>
                <td class="text-center">'.$t['prenom'].'</td>
                <td class="text-center">'.$t['tel'].'</td>
                <td class="text-center">'.$t['compte_Bancaire'].'</td>
                <td class="text-center">'.$t['email'].'</td>
                <td class="text-center">'.$t['password'].'</td>
                <td class="text-center">
                    <form action="../include/handlers/UserHandler.php" id="form" method="post" class="text-center">
                      <input type="hidden" name="role" value="'.$t['id'].'">                        
                      <input type="hidden" name="id" value="'.$t['id'].'">                        
                        '.$action.'
                    </form>
                </td>
              </tr>';
          }
        ?>
        </tbody>
    </table>
</div>
<!-- </body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
<!-- main -->
<!-- <script src="../../assets/js/main3.js"></script>
<script src="../../assets/js/main2.js"></script> -->
<!-- dataTable -->
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="../../assets/js/datatable/code.js"></script> -->
<!-- Font Awesome JS -->
<!-- <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script> -->

<!-- </html> -->