<?php


class User
{

    private $image;
    private	$cin;
    private	$nom;
    private	$prenom;
    private	$tel;
    private	$compte_Bancaire;
    private	$email;
    private	$password;	


 public function __construct($image,$cin,$nom,$prenom,$tel,$compte_Bancaire,$email,$password)
 {
    $this->image = $image;
    $this->cin = $cin;
    $this->nom = $nom;
    $this->prenom = $prenom;
    $this->tel = $tel;
    $this->compte_Bancaire = $compte_Bancaire;
    $this->email = $email;
    $this->password = $password;
 }


    public function getImage()
    {
        return $this->image;
    }


    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getCin()
    {
        return $this->cin;
    }


    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    public function getNom()
    {
        return $this->nom;
    }


    public function setNom($nom)
    {
        $this->nom = $nom;
    }


    public function getPrenom()
    {
        return $this->prenom;
    }


    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    public function getTel()
    {
        return $this->tel;
    }


    public function setTel($tel)
    {
        $this->tel = $tel;
    }


    public function getCompteBancaire()
    {
        return $this->compte_Bancaire;
    }

    public function setCompteBancaire($compte_Bancaire)
    {
        $this->compte_Bancaire = $compte_Bancaire;
    }


    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }


    public function getPasword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }



    public function getUniqueIdForBothAllerRotour(){
        return $this->uniqueIdForBothAllerRotour;
    }

    public function setUniqueIdForBothAllerRotour($id){
        $this->uniqueIdForBothAllerRotour=$id;
    }


    



}
