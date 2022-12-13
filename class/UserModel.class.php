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
    

    protected function updateUserInfo($first_name,$last_name,$tel,$bank,$email,$id){
        $query = "UPDATE `users` SET `prenom`=?,`nom`=?,`tel`=?,`compte_Bancaire`=?,`email`=? WHERE id=?;";        
        $statement = $this->connect()->prepare($query);
        $statement->execute(array($first_name,$last_name,$tel,$bank,$email,$id));
    }
//     public function getUserInfo($id){
//       $query = "SELECT * FROM `users` WHERE id=?;";
//       $statement=$this->connect()->prepare($query);
//       if(!$statement->execute(array($id))){
//           $statement=null;
//           exit();
//       }
//       $arr = $statement->fetchAll();
//       return $arr;
//   }

}