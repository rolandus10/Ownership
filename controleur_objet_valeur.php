<?php
include 'model.php';
/*
$nom=$_POST['nom'];
$description=$_POST['description'];
$type=$_POST['type'];
$date_achat=$_POST['date_achat'];
$prix=$_POST['prix'];
$quatite=$_POST['quantite'];
*/

if (!empty($_POST['nom'])
&& !empty($_POST['description'])
&&!empty($_POST['type'])
&&!empty($_POST['date_achat'])
&& !empty($_POST['prix'])
&& !empty($_POST['quantite'])){
  try{
    //insertion de l'utilisateur dans la base de donnée
    $utilisateur = unserialize($_SESSION['utilisateur']);
    $idutilisateur = $utilisateur->getId_utilisateur();
    $sql_objet_valeur = 'INSERT INTO objet_valeur(type,date_achat) VALUES(?,?)';
    $requete_objet_valeur = $bdd->prepare($sql_objet_valeur);
    $requete_objet_valeur->execute( array($_POST['type'],$_POST['date_achat']));

    $idobjet_valeur = $bdd->lastInsertId();

    $sql_produit = 'INSERT INTO produit(nom,description,prix,objet_valeur_idobjet_valeur)
     VALUES(?,?,?,?)';
    $requete_produit = $bdd->prepare($sql_produit);
    $requete_produit->execute( array($_POST['nom'],$_POST['description'],
    $_POST['prix'], $idobjet_valeur));

    $idproduit = $bdd->lastInsertId();


    $sql_stocker = 'INSERT INTO stocker(utilisateur_idutilisateur,
    produits_idProduit,quantite) VALUES(?,?,?)';
    $requete_stocker = $bdd->prepare($sql_stocker);
    $requete_stocker->execute( array($idutilisateur,$idproduit,$_POST[
      'quantite']));


    //on doit creer une vue pour afficher ce message
    echo '<p> Objet de valeur enregistré </p>';
    include "form/objet_valeur.html";
  }

  catch(Exception $e){
  echo "Erreur : ".$e->getMessage();
  }
}
if(!empty($_POST['nom_objet'])){
  $nom_objet =$_POST['nom_objet'] ;
  $utilisateur = unserialize($_SESSION['utilisateur']);
  $idutilisateur = $utilisateur->getId_utilisateur();

	$sql = "SELECT * FROM ((produit INNER JOIN stocker ON produit.idProduit =
    stocker.produits_idProduit ) INNER JOIN utilisateur ON utilisateur.idutilisateur =
    stocker.utilisateur_idutilisateur) WHERE idutilisateur ='$idutilisateur' AND produit.Nom ='$nom_objet' ";

    $resultat_data=$bdd->query($sql);
	//echo $resultat_data;
	//$sql_get_id="  SELECT idProduit,aliment_idaliment FROM $resultat_data WHERE Nom ='$nom_aliment'";

    //$resultat1 = $bdd->query($sql_get_id);
	while($data = $resultat_data->fetch())
	{
    if($data['Nom'] == $nom_objet){

      $val1=$data["idProduit"];
  		$val2=$data["objet_valeur_idobjet_valeur"];
      $sql_delete1 = "delete FROM produit WHERE idProduit =$val1";
    	$sql_delete2 = "delete FROM objet_valeur WHERE idobjet_valeur =$val2";
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
     stocker.produits_idProduit) INNER JOIN objet_valeur ON produit.objet_valeur_idobjet_valeur =
      objet_valeur.idobjet_valeur WHERE idutilisateur ='$idutilisateur'";
      $resultat_data=$bdd->query($sql_data);

  include 'objet_valeur_view.php';
}
else {
  echo '<p> des champs sont vides ou incorrectes </p>';
  include 'form/objet_valeur.html';
}
 ?>
