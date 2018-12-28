<?php
include 'model.php';

$nom=$_POST['nom'];
$description=$_POST['description'];
$couleur=$_POST['couleur'];
$taille=$_POST['taille'];
$marque=$_POST['marque'];
$type=$_POST['type'];
$date_achat=$_POST['date_achat'];
$quatite=$_POST['quantite'];
$prix=$_POST['prix'];

if (!empty($_POST['nom'])
&& !empty($_POST['description'])
&& !empty($_POST['couleur'])

&& !empty($_POST['taille'])
&& !empty($_POST['marque'])
&& !empty($_POST['type'])
&& !empty($_POST['date_achat'])
&& !empty($_POST['quantite'])
&& !empty($_POST['prix'])){
  try{
    //insertion de l'utilisateur dans la base de donnée


   $sql_vetement = 'INSERT INTO vetement(couleur,marque,taille,type,date_achat)
   VALUES(?,?,?,?,?)';
   $requete_vetement = $bdd->prepare($sql_vetement);
   $requete_vetement->execute( array($_POST['couleur'],$_POST['marque'],$_POST[
        'taille'],$_POST['type'],$_POST['date_achat']));
  //recupere l'id du dernier ajout a la base de donnée
   $idvetement = $bdd->lastInsertId();


   $sql_produit = 'INSERT INTO produit(nom,description,prix,vetement_idvetements)
   VALUES(?,?,?,?)';
   $requete_produit = $bdd->prepare($sql_produit);
   $requete_produit->execute( array($_POST['nom'],$_POST['description'],$_POST[
        'prix'], $idvetement));
   //recupere l'id du dernier ajout a la base de donnée
   $idproduit = $bdd->lastInsertId();


   $utilisateur = unserialize($_SESSION['utilisateur']);
   $idutilisateur = $utilisateur->getId_utilisateur();
   echo "$idutilisateur";
   $sql_stoker = 'INSERT INTO stocker(utilisateur_idutilisateur,
   produits_idProduit,quantite) VALUES(?,?,?)';
   $requete_stocker = $bdd->prepare($sql_stoker);
   $requete_stocker->execute( array($idutilisateur,$idproduit,$_POST['quantite']));


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
