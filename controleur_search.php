<?php

include 'model.php';

$Mot = $_POST['Mot'];
$utilisateur = unserialize($_SESSION['utilisateur']);
$id = $utilisateur->getId_utilisateur();




if (($Mot == "")||($Mot == "%")) {
// Si aucun mot clé n'a été saisi,
// le script demande à l'utilisateur
// de bien vouloir préciser un mot clé

echo "
Veuillez entrer un mot clé s'il vous plaît!
<p>";
include 'acceuil.php';

}

else {
  try{


    $sql_data = " SELECT * FROM stocker INNER JOIN produit on
    stocker.produits_idProduit=produit.idProduit WHERE
    stocker.utilisateur_idutilisateur = '$id' AND produit.nom='$Mot'";
      $resultat_data=$bdd->query($sql_data);

          include 'search.php';
/*
    $sql_data = "SELECT * FROM produit  WHERE nom like \"%$Mot%\" AND
    idProduit='$idProduit1'";
    //recuperation
    $resultat_data=$bdd->query($sql_data);


    while ($data = $resultat_data->fetch()) {
      echo $data['nom'],'  ',$data['prix'];
      $idProduit =$data['idProduit'];
      $idaliment =$data['aliment_idaliment'];
      $idvetement=$data['vetement_idvetements'];
      $idobjet_valeur = $data['objet_valeur_idobjet_valeur'];
    }
    $sql_data2 = "SELECT quantite FROM stocker  WHERE produits_idProduit= '$idProduit
    '";
    //recuperation
    $resultat_data2=$bdd->query($sql_data2);
      while ($data2 = $resultat_data2->fetch()) {
        echo '  ',$data2['quantite'];

      }
      if($idaliment != 'NULL'){
        $sql_data3 = "SELECT date_peremption FROM aliment  WHERE
         idaliment= '$idaliment'";
        //recuperation
        $resultat_data3=$bdd->query($sql_data3);
          while ($data3 = $resultat_data3->fetch()) {
            echo '  ',$data3['date_peremption'];

          }
      }
       if ($idvetement != 'NULL' ) {
        $sql_data4 = "SELECT date_achat FROM vetement  WHERE
         idvetements= '$idvetement'";
        //recuperation
        $resultat_data4=$bdd->query($sql_data4);
          while ($data4 = $resultat_data4->fetch()) {
            echo '  ',$data4['date_achat'];

          }
      }
      if ($idobjet_valeur != 'NULL' ) {
        $sql_data5 = "SELECT date_achat FROM objet_valeur  WHERE
         idobjet_valeur= '$idobjet_valeur'";
        //recuperation
        $resultat_data5=$bdd->query($sql_data5);
          while ($data5 = $resultat_data5->fetch()) {
            echo '  ',$data5['date_achat'];
      }
    }

*/
}
catch(Exception $e){
echo "Erreur : " ,$e->getMessage();
exit();
}
// on ferme la base
//mysql_close();
}


?>
