<?php

/**
 *
 */
class utilisateur
{
  private $nom;
  private $prenom;
  private $ville;
  private $email;
  private $pass;


  function __construct()
  {

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
  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setPass($pass)
  {
    $this->pass = $pass;
  }
  public function getPass()
  {
    return $this->pass;
  }
}

 ?>
