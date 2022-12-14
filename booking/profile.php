<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<div class="w-100">
    <div class=" p-5 mt-5">
      
        <div class="card-header bg-transparent d-flex justify-content-center">
            <div class="position-relative" style="width: fit-content">
                <div style="width: 150px;height:150px;background-image:url('./../<?php //echo $_SESSION['user']['image']?>'); background-position:center; border-radius: 50%; background-size: cover;" id="img_holder"></div>
                <button idedit="Edit_<?php //echo $_SESSION['user']['id']?>" class="rounded-circle border-0 position-absolute" onclick="editPhotoProfil()" style="background-color: var(--main-color);bottom:10px;right: 20px;padding: 5px;padding-inline: 9px;"><i class="fas fa-light fa-pen text-light"></i></button>
            </div>

        </div>
        <form action="../include/handlers/UserHandler.php" method="POST" class="needs-validation" class="card-body= w-100" novalidate>
            <input type="hidden" name="id" value="">
                <div class="d-flex justify-content-between">
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">First name</label>    
                            <input class="form-control" type="text" name="first_name" value="" required>
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">Second name</label>
                            <input class="form-control"  type="text" name="last_name" value="" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">Phone number</label>
                            <input class="form-control" type="tel" name="tel" placeholder="0XXXXXXXXX" value="">
                        </div>
                    </div>
                    <div class="w-100">
                        <div class="p-3">
                            <label for="">Bank number</label>
                            <input class="form-control"  type="int" name="bank" value="" >
                        </div>
                    </div>
                </div>
                    <div class="p-3">
                        <label for="">Email</label>
                        <input class="form-control"  type="email" name="email" value="" required>
                    </div>
                <div class="d-flex justify-content-between">
                    <div class="w-50">
                        <div class="form-outline p-3">
                            <label class="form-label" for="">Old Password</label>
                            <input type="password"  name="password" class="form-control"  value="" required/>
                        </div>
                    </div>
                    

                    <div class="w-50">
                        <div class="form-outline p-3">
                        <label class="form-label" for="">New Password</label>
                        <input type="password"  name="newPassword" class="form-control"  value="" required/>
                    </div>
                    </div>
                    
                </div>    
                

                <div class="d-flex justify-content-end">
                     <div class="card-footer bg-transparent mt-5">
                        <button type="submit" class="btn btn-danger" name="deleteaccount">Delete account</button>
                    </div>
                    <div class="card-footer bg-transparent mt-5">
                        <button type="submit" class="btn btn-success" name="savechanges">Save changes</button>
                    </div>
                </div>
        </form>
    </div>
</div>
    
</body>
</html>