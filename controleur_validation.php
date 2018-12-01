<?php

include 'model.php';

if(isset($_POST['nom'])
&& isset($_POST['prenom'])
&& isset($_POST['ville'])
&& isset($_POST['pass'])
&& isset($_POST['email'])
&& isset($_POST['passconfirme'])){

  //pas encore utile
  $utilisateur = new Utilisateur();
  $utilisateur->setNom($_POST['nom']);
  $utilisateur->setPrenom($_POST['prenom']);
  $utilisateur->setVille($_POST['ville']);
  $utilisateur->setEmail($_POST['email']);
  $utilisateur->setPass($_POST['pass']);

  try{
    //insertion de l'utilisateur dans la base de donnée
    $requete = $bdd->prepare('INSERT INTO utilisateur(login,mot_de_passe,nom,prenom,ville) VALUES(?,?,?,?,?)');
    $requete->execute( array($_POST['email'],$_POST['pass'],$_POST['nom'],$_POST['prenom'],$_POST['ville']));

    //on doit creer une vue pour afficher ce message
    echo '<p> Felicitation '.$_POST['prenom'].' vous êtes inscrit sur Ownership</p>';
  }

  catch(Exception $e){
  echo "Erreur : ".$e->getMessage();
  }
}

else {
  echo '<p> /!\ Veuillez completer les champs correctement</p><br>';
  include 'nouvel_utilisateur.html';
}
 ?>
