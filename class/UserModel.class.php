<?php
include_once('DB.php');

class UserModel extends DB
{
    
    protected function getAllUser(){
        $sql = "SELECT * from users";
        $statement = $this->Connect()->prepare($sql);
        $statement->execute();
        $res = $statement->fetchAll();
        return $res;
    }


    protected function updateRoleInDB($role,$id){
        try{
            $sql="UPDATE `users` SET `role`=? where `id`=$id";
            $statement = $this->Connect()->prepare($sql);
            $statement->execute(array($role));
            $_SESSION['message']="Role user has been update successfully";
        }catch(PDOException $er){
            $_SESSION['error']="Role user has been not update";
            echo $er->getMessage();
        }
    }
    

    protected function updateUserInfo($first_name,$last_name,$tel,$bank,$email,$new_password,$id){
        $query = "UPDATE `users` SET `prenom`=?,`nom`=?,`tel`=?,`compte_Bancaire`=?,`email`=?,`password`=? WHERE id=?";        
        $statement = $this->connect()->prepare($query);
        $statement->execute(array($first_name,$last_name,$tel,$bank,$email,$new_password,$id));
    }

    protected function deleteUserAcc($id){
        $query = "DELETE FROM `users` WHERE id=?";
        $statement = $this->connect()->prepare($query);
        $statement->execute(array($id));
        
    }










    public function bookTrip($id_user,$orderList){
        $date_now = (new DateTime())->format("Y-m-d");
        foreach ($orderList as $order){
            $sql = "INSERT INTO reservations values (NULL,'$date_now',".$order['quantity'].",".$order['id'].",$id_user)";
            $statm = $this->Connect()->prepare($sql);
            if(!$statm->execute()){
                var_dump($statm);
                return false;
            }
        }
        return true;
    }
}