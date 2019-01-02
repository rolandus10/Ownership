<?php
include 'model.php';
/*
$nom=$_POST['nom'];
$nom=$_POST['description'];
$type=$_POST['type'];
$date_peremption=$_POST['date_peremption'];
$prix=$_POST['prix'];
$quatite=$_POST['quantite'];
/*echo "$nom";
echo "$nom";
echo "$type";
echo "$date_peremption";
echo "$prix";
echo "$quatite";
*/

if (!empty($_POST['nom'])
&& !empty($_POST['description'])
&&!empty($_POST['type'])
&&!empty($_POST['date_peremption'])
&& !empty($_POST['prix'])
&& !empty($_POST['quantite'])){
  try{

    $utilisateur = unserialize($_SESSION['utilisateur']);
    $idutilisateur = $utilisateur->getId_utilisateur();

    $sql_aliment = 'INSERT INTO aliment(date_peremption,type) VALUES(?,?)';
    $requete_aliment = $bdd->prepare($sql_aliment);
    $requete_aliment->execute( array($_POST['date_peremption'],$_POST['type']));

     $idaliment = $bdd->lastInsertId();


    $sql_produit = 'INSERT INTO produit(nom,description,prix,aliment_idaliment)
    VALUES(?,?,?,?)';
    $requete_produit = $bdd->prepare($sql_produit);
    $requete_produit->execute( array($_POST['nom'],$_POST['description'],$_POST[
    'prix'],$idaliment));

     $idproduit = $bdd->lastInsertId();


    $sql_stocker = 'INSERT INTO stocker(utilisateur_idutilisateur,
    produits_idProduit,quantite) VALUES(?,?,?)';
    $requete_stocker = $bdd->prepare($sql_stocker);
    $requete_stocker->execute( array($idutilisateur,$idproduit,$_POST['quantite']));
    echo '<p> aliment enregistré </p>';
  }

  catch(Exception $e){
  echo "Erreur : ".$e->getMessage();
  }
}

if(!empty($_POST['nom_aliment'])){
	echo $_POST['nom_aliment'];
  $nom_aliment =$_POST['nom_aliment'] ;
  $utilisateur = unserialize($_SESSION['utilisateur']);
  $idutilisateur = $utilisateur->getId_utilisateur();

	$sql = "SELECT * FROM ((produit INNER JOIN stocker ON produit.idProduit =
    stocker.produits_idProduit ) INNER JOIN utilisateur ON utilisateur.idutilisateur =
    stocker.utilisateur_idutilisateur) WHERE idutilisateur ='$idutilisateur' AND produit.Nom ='$nom_aliment' ";

    $resultat_data=$bdd->query($sql);
	//echo $resultat_data;
	//$sql_get_id="  SELECT idProduit,aliment_idaliment FROM $resultat_data WHERE Nom ='$nom_aliment'";

    //$resultat1 = $bdd->query($sql_get_id);
	while($data = $resultat_data->fetch())
	{
    if($data['Nom'] == $nom_aliment){

      $val1=$data["idProduit"];
  		$val2=$data["aliment_idaliment"];
      echo "$val1";
      echo "$val2";
      $sql_delete1 = "delete FROM produit WHERE idProduit =$val1";
    	$sql_delete2 = "delete FROM aliment WHERE idaliment =$val2";
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
     stocker.produits_idProduit) INNER JOIN aliment ON produit.aliment_idaliment =
      aliment.idaliment WHERE idutilisateur ='$idutilisateur'";
      $resultat_data=$bdd->query($sql_data);


    include 'aliment_view.php';
}

else {
  echo '<p> des champs sont vides ou incorrectes </p>';
  include 'aliment.html';
}
/*
"SELECT * FROM ((
  utilisateur INNER JOIN stocker ON stocker.utilisateur_idutilisateur =
   utilisateur.idutilisateur) INNER JOIN produit ON produit.idProduit =
   stocker.produits_idProduit) INNER JOIN vetement ON produit.vetement_idvetements =
    vetement.idvetements WHERE login = '$login' AND mot_de_passe = '$pass'";
*/
?>
