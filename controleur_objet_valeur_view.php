<?php


include "model.php";

$today = date("Y-m-d");
$utilisateur = unserialize($_SESSION['utilisateur']);
$idutilisateur = $utilisateur->getId_utilisateur();
$sql_data = "SELECT * FROM ((
  utilisateur INNER JOIN stocker ON stocker.utilisateur_idutilisateur =
   utilisateur.idutilisateur) INNER JOIN produit ON produit.idProduit =
   stocker.produits_idProduit) INNER JOIN objet_valeur ON produit.objet_valeur_idobjet_valeur =
    objet_valeur.idobjet_valeur WHERE idutilisateur ='$idutilisateur'";
    $resultat_data=$bdd->query($sql_data);

include 'objet_valeur_view.php';



 ?>
