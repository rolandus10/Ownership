<?php
include 'model.php';

$login = $_POST['login'];
$pass = $_POST['pass'];

if (!empty($login)
&& !empty($pass)){

  try{
    $sql_login = 'SELECT * FROM utilisateur';
    $resultat_login=$bdd->query($sql_login);
    //permet de savoir si l'utilisateur a éte trouvé
    $trouvé = False;

    //parcour de toutes les lignes de la table utilisateur
    //pour trouver l'utilisateur
    while($data_login = $resultat_login->fetch()){
      if ($data_login['login']== $login && $data_login['mot_de_passe']== $pass)
      {
        $trouvé = True;
        //sql pour récuperation des données liées à l'utilisateur
        $sql_data = "SELECT * FROM ((
          utilisateur INNER JOIN stocker ON stocker.utilisateur_idutilisateur =
           utilisateur.idutilisateur) INNER JOIN produit ON produit.idProduit =
           stocker.produits_idProduit) INNER JOIN vetement ON produit.vetement_idvetements =
            vetement.idvetements WHERE login = '$login' AND mot_de_passe = '$pass'";
        //recuperation d'un tableau contenant toutes les données de l'ytilisateur
        $resultat_data=$bdd->query($sql_data);
        $utilisateur = new Utilisateur();
        while($data = $resultat_data->fetch()){
           $utilisateur->setId_utilisateur($data['idutilisateur']);
           $_SESSION['utilisateur'] = serialize($utilisateur);
      }
      include 'acceuil.php';
    }

    if ($trouvé == False){
      echo '<p> login ou mot de passe erroné </p><br>';
      include 'login.html';
    }

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
