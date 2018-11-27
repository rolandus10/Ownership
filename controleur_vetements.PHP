<?php

if (!empty($_POST['nom'])
&& !empty($_POST['description'])
&& !empty($_POST['date_achat'])
&& !empty($_POST['prix'])){
  try{
    //insertion de l'utilisateur dans la base de donnée
    $sql = 'INSERT INTO produits(Nom,Description,Date_achat,Prix) VALUES(?,?,?)';
    $requete = $bdd->prepare($sql);
    $requete->execute( array($_POST['nom'],$_POST['description'],$_POST['date_achat'],$_POST['prix']));

    //on doit creer une vue pour afficher ce message
    echo '<p> vetement enregistré </p>';
  }

  catch(Exception $e){
  echo "Erreur : ".$e->getMessage();
  }
}
else {
  echo '<p> des champs sont vides ou incorrectes </p>';
  include 'vetement.html';
}
 ?>
