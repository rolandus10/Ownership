<?php
include 'model.php';

$login = $_POST['login'];
$pass = $_POST['pass'];

if (isset($login)
&& isset($pass)){

  try{
    $sql = 'SELECT * FROM utilisateur';
    $resultat=$bdd->query($sql);

    //permet de savoir si l'utilisateur a éte trouvé
    $trouvé = False;

    //parcour de toutes les lignes de la table utilisateur
    while($data = $resultat->fetch()){
      if ($data['login']== $login && $data['mot_de_passe']== $pass)
      {
        $trouvé = True;
        echo '<p>Bienvenue '. $data['Prenom'].'</p><br>';
        include 'acceuil.html';
      }
    }

    if ($trouvé == False){
      echo '<p> login ou mot de passe erroné </p><br>';
      include 'login.html';
    }

  }

  catch (Exception $e){
    //message en cas d'erreur
    die('Erreur : '.$e->getMessage());
  }
}
else
{
  echo '<p> login ou mot de passe erroné </p><br>';
  include 'login.html';
}
