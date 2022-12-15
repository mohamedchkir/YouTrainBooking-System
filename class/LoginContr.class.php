<?php

// include_once("../autoloader.php");
include_once("LoginModel.class.php");
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

class LoginContr extends LoginModel {
    public function __construct($email,$password)

    {

        $this->email = $email;
        $this->password = $password;
    }

    public function LoginUr()
    {
        if ($this->emptyInput() == false) {
            header("location:../../login.php?msg=fill all fields");
            exit();
        }
        $userinfo =  $this->getUser($this->email, $this->password);
        $this->verifyRecords($userinfo);
    }

    public function emptyInput()
    {
        if (empty($this->email) || empty($this->password)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }

    private function verifyRecords($userinfo)
    {

        if (!$userinfo) {
            header("location:../../login.php?msg=Your email is not part of our records");

        }elseif($this->password != $userinfo["password"]){
                header("location:../../login.php?msg=Wrogn password");
        }else{
                $_SESSION["user"] = $userinfo;
                header("location:../../index.php");
                

            }
        }
    }
// }

