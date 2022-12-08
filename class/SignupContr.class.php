<?php
include_once("../autoloader.php");

class SignupContr extends SignupModel {

    private $first_name;
    private $last_name;
    private $email;
    private $password;
    private $confirm_password;


    public function __construct($first_name,$last_name,$email,$password,$confirm_password)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
        $this->password = $password;
        $this->confirm_password = $confirm_password;
    }

    public function SignUpUr(){
        if($this->emptyInput()==false){
            header("location:../../singup.php?msg=fill all fields");
            exit();
        }elseif ($this->checkEmail()==false){
            header("location:../../signup.php?msg=First name or Last name already exist");
            exit();
        }elseif ($this->passwordMatch()==false){
            header("location:../../signup.php?msg=Password does not match");
            exit();
        }elseif ($this->emailTaken() == false){
            header("location:../../signup.php?msg=Email is already exist");
            exit();
        }
            $this->setUser($this->first_name,$this->last_name,$this->email,$this->password);
    }

    public function emptyInput(){
        if(empty($this->first_name) || empty($this->last_name) || empty($this->email) || empty($this->password) || empty($this->confirm_password)){
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

    public function passwordMatch(){
        if($this->password !== $this->confirm_password){
            $result = false ;
        }
        else {
            $result = true;
        }
        return $result;
    }

    public function emailTaken(){
        if(!$this->Validation($this->email)){
            $result = false ;
        }
        else {
            $result = true;
        }
        return $result;
    }

    

}