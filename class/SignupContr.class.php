<?php
include_once("../autoloader.php");

class SignupContr extends SignupModel {

    private $f_name;
    private $l_name;
    private $email;
    private $password;
    private $confirm_password;


    public function __construct($f_name,$l_name,$email,$password,$confirm_password)
    {
        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }

    public function SignUpUr(){
        if($this->emptyInput()==false){
            $check=" Please fill all fields";
        }elseif ($this->checkEmail()==false){
            $check=" Email format is invalid";
        }elseif ($this->passwordMatch($this->password,$this->confirm_password)==false){
            $check=" Unmatch password & password confirmation";
        }else
        {
            $this->createUser($this->f_name,$this->s_name,$this->email,$this->pwd);
            $check=true;
        }
        return $check;
    }

    public function emptyInput(){
        if(empty($this->username || $this->email || $this->password || $this->confirm_password)){
            $result = false;
        }
        else {
            $result = true;
        }
        return $result;
    }

    public function checkEmail(){
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $result = false;
        }
        else{
            $result = true ;
        }
        return $result;
    }

    public function passwordMatch($password, $confirm_password){

        if($this->password !== $this->confirm_password){
            $result = false ;
        }
        else {
            $result = true;
        }
        return $result;
    }

}