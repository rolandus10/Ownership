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
  private $id_utilisateur;


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
  public function setVille($ville)
  {
    $this->ville = $ville;
  }
  public function getVille()
  {
    return $this->ville;
  }

  public function setId_utilisateur($id_utilisateur)
  {
    $this->id_utilisateur = $id_utilisateur;
  }
  public function getId_utilisateur()
  {
    return $this->id_utilisateur;
  }
}

 ?>
