<?php
include 'model.php';
/*
$nom=$_POST['nom'];
$description=$_POST['description'];
$couleur=$_POST['couleur'];
$taille=$_POST['taille'];
$marque=$_POST['marque'];
$type=$_POST['type'];
$date_achat=$_POST['date_achat'];
$quatite=$_POST['quantite'];
$prix=$_POST['prix'];
*/

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
   $sql_stoker = 'INSERT INTO stocker(utilisateur_idutilisateur,
   produits_idProduit,quantite) VALUES(?,?,?)';
   $requete_stocker = $bdd->prepare($sql_stoker);
   $requete_stocker->execute( array($idutilisateur,$idproduit,$_POST['quantite']));


    //on doit creer une vue pour afficher ce message
    echo '<p> vetement enregistré </p>';
    include "vetement.html";
  }

  catch(Exception $e){
  echo "Erreur : ".$e->getMessage();
  }
}

if(!empty($_POST['nom_vetement'])){
  $nom_vetement =$_POST['nom_vetement'] ;
  $utilisateur = unserialize($_SESSION['utilisateur']);
  $idutilisateur = $utilisateur->getId_utilisateur();

	$sql = "SELECT * FROM ((produit INNER JOIN stocker ON produit.idProduit =
    stocker.produits_idProduit ) INNER JOIN utilisateur ON utilisateur.idutilisateur =
    stocker.utilisateur_idutilisateur) WHERE idutilisateur ='$idutilisateur' AND produit.Nom ='$nom_vetement' ";

    $resultat_data=$bdd->query($sql);
	//echo $resultat_data;
	//$sql_get_id="  SELECT idProduit,aliment_idaliment FROM $resultat_data WHERE Nom ='$nom_aliment'";

    //$resultat1 = $bdd->query($sql_get_id);
	while($data = $resultat_data->fetch())
	{
    if($data['Nom'] == $nom_vetement){

      $val1=$data["idProduit"];
  		$val2=$data["vetement_idvetements"];
      $sql_delete1 = "delete FROM produit WHERE idProduit =$val1";
    	$sql_delete2 = "delete FROM vetement WHERE idvetements =$val2";
    	$sql_delete3 = "delete FROM stocker WHERE produits_idProduit =$val1";

    	$resultat_delete1 = $bdd->query($sql_delete1);
    	$resultat_delete2 = $bdd->query($sql_delete2);
    	$resultat_delete3 = $bdd->query($sql_delete3);
    }

	}
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
}
else {
  echo '<p> des champs sont vides ou incorrectes </p>';
  include 'vetement.html';
}

 ?>
