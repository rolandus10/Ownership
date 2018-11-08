<?php

include 'model.php';

if(isset($_POST['nom'])
&& isset($_POST['prenom'])
&& isset($_POST['ville'])
&& isset($_POST['pass'])
&& isset($_POST['email'])
&& isset($_POST['passconfirme'])){
echo '<p> Bienvenu '.$_POST['prenom'].' sur Ownership</p>';
$utilisateur = new Utilisateur();
$utilisateur->setNom($_POST['nom']);
$utilisateur->setPrenom($_POST['prenom']);
$utilisateur->setVille($_POST['ville']);
$utilisateur->setEmail($_POST['email']);
$utilisateur->setPass($_POST['pass']);


}

else {
  echo '<p> /!\ Veuillez completer les champs correctement</p><br>';
  include 'nouvel_utilisateur.html';
}
 ?>
