<?php
include 'model.php';
/*
$nom = $_POST['nom'];
$description = $_POST['description'];
$couleur = $_POST['couleur'];
$marque = $_POST['marque'];
$taille = $_POST['taille'];
$type = $_POST['type'];
$date_achat = $_POST['date_achat'];
$prix = $_POST['prix'];
$quantite = $_POST['quantite'];

if (!empty($_POST['nom'])
&& !empty($_POST['description'])
&& !empty($_POST['couleur'])
&& !empty($_POST['marque'])
&& !empty($_POST['taille'])
&& !empty($_POST['type'])
&& !empty($_POST['date_achat'])
&& !empty($_POST['prix'])
&& !empty($_POST['quantite'])){
  try{
    //insertion de l'utilisateur dans la base de donnée
    $sql_vetement = 'INSERT INTO vetement(couleur,marque,taille,type,date_achat)
      VALUES(?,?,?,?,?)';
    $requete_vetement = $bdd->prepare($sql_vetement);
    $requete_vetement->execute( array($couleur,$marque,$taille,$type,$date_achat));

      $sql_idvetement = "SELECT vetement.idvetements FROM vetement WHERE taille = '$taille'
      AND couleur ='$couleur' AND marque ='$marque' AND type = '$type'
      AND date_achat = '$date_achat'";
      $resultat_idvetement=$bdd->query($sql_idvetement);
      $idvetement;
      while($data_idvetement = $resultat_idProduit -> fetch()){
        $idvetement = $data_idvetement['idProduit'];
      }

      $sql_produit = 'INSERT INTO produit(nom,description,prix,) VALUES(?,?,?)';
      $requete_produit = $bdd->prepare($sql_produit);
      $requete_produit->execute( array($nom,$description,$prix));


      $sql_stoker = 'INSERT INTO stoker(utilisateur_idutilisateur,
        produits_idProduit,quantite) VALUES(?,?)';

      $utilisateur = unserialize($_SESSION['utilisateur']);
      echo '<p> '.$utilisateur->getNom().'</p>';

      echo '<p> '.$idProduit.'</p>';
      echo '<p> '.$utilisateur->getNom().'</p>';




    //on doit creer une vue pour afficher ce message
    echo '<p> vetement enregistré </p>';
  }

  catch(Exception $e){
  echo "Erreur : ".$e->getMessage();
  }
}
else {
  echo '<p> des champs sont vides ou incorrectes </p>';
  include 'vetements.html';
}
 ?>
 */

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
   $idvetement = $bdd->lastInsertId();
/*
   $sql_idvetement = "SELECT idvetements FROM vetement WHERE taille =
   '$taille' AND couleur ='$couleur' AND marque ='$marque' AND type = '$type'
   AND date_achat = '$date_achat'";
   $resultat_idvetement=$bdd->query($sql_idvetement);
   $idvetement='none';
   while ($idvetement_data = $resultat_idvetement -> fetch()) {
     $idvetement = $idvetement_data['idvetements'];
   }
   */


   $sql_produit = 'INSERT INTO produit(nom,description,prix,vetement_idvetements)
   VALUES(?,?,?,?)';
   $requete_produit = $bdd->prepare($sql_produit);
   $requete_produit->execute( array($_POST['nom'],$_POST['description'],$_POST[
        'prix'], $idvetement));
   $idproduit = $bdd->lastInsertId();

   /*
   $sql_idproduit = "SELECT idProduit FROM produit WHERE nom =
   '$nom' AND description ='$description' AND prix ='$prix'";
   $resultat_idproduit=$bdd->query($sql_idproduit);
   $idproduit = 'none';
   while ($idproduit_data = $resultat_$idproduit -> fetch()) {
     $idproduit = $idproduit_data['idProduit'];
   }*/



   $utilisateur = unserialize($_SESSION['utilisateur']);
   $idutilisateur = $utilisateur->getId_utilisateur();
   $sql_stoker = 'INSERT INTO stoker(utilisateur_idutilisateur,
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
