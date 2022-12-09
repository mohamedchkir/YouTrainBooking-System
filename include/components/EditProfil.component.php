<?php

$user=$_SESSION['user'];
?>

<div class="w-100">
    <div class=" p-5 mt-5">
      
        <div class="card-header bg-transparent d-flex justify-content-center">
            <div class="position-relative" style="width: fit-content">
                <div style="width: 150px;height:150px;background-image:url('./..<?php echo $user['image']?>'); background-position:center; border-radius: 50%; background-size: cover;"></div>
                <button idedit="Edit_<?php echo $user['id']?>" class="rounded-circle border-0 position-absolute" id="edit_user_img" style="background-color: var(--main-color);bottom:10px;right: 20px;padding: 5px;padding-inline: 9px;"><i class="fas fa-light fa-pen text-light"></i></button>
            </div>

        </div>
        <form action="includes/userInfoHandler.php" method="post" class="card-body= w-100" >
            <input type="hidden" name="id" value="<?php echo $user['id']?>">
                <div class="d-flex justify-content-between">
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">First name</label>
                            <input class="form-control" type="text" name="f_name" value="<?php echo $user['prenom']?>">
                        </div>
                    </div>
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">Second name</label>
                            <input class="form-control"  type="text" name="s_name" value="<?php echo $user['nom']?>">
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="w-50">
                        <div class="p-3">
                            <label for="">Phone number</label>
                            <input class="form-control" type="text" name="f_name" value="<?php echo $user['tel']?>">
                        </div>
                    </div>
                    <div class="w-100">
                        <div class="p-3">
                            <label for="">Bank number</label>
                            <input class="form-control"  type="text" name="s_name" value="<?php echo $user['compte_Bancaire']?>" >
                        </div>
                    </div>
                </div>
                <div class="p-3">
                    <label for="">Email</label>
                    <input class="form-control"  type="email" name="email" value="<?php echo $user['email']?>"disabled>
                </div>
                <div class="form-outline p-3">
                    <label class="form-label" for="">Password</label>
                    <input type="password"  name="p_password" class="form-control"  value=""/>
                </div>

                <div class="d-flex justify-content-end">
                     <div class="card-footer bg-transparent mt-5">
                        <button class="btn btn-danger" name="savechanges">Delete account</button>
                    </div>
                    <div class="card-footer bg-transparent mt-5">
                        <button class="btn btn-success" name="savechanges">Save changes</button>
                    </div>
                </div>
               
        </form>
    </div>
</div>
