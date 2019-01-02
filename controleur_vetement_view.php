<?php
include "model.php";


$today = date("Y-m-d");
$utilisateur = unserialize($_SESSION['utilisateur']);
$idutilisateur = $utilisateur->getId_utilisateur();
$sql_data = "SELECT * FROM ((
  utilisateur INNER JOIN stocker ON stocker.utilisateur_idutilisateur =
   utilisateur.idutilisateur) INNER JOIN produit ON produit.idProduit =
   stocker.produits_idProduit) INNER JOIN vetement ON produit.vetement_idvetements =
    vetement.idvetements WHERE idutilisateur ='$idutilisateur'";
    $resultat_data=$bdd->query($sql_data);

include 'vetement_view.php';
?>
