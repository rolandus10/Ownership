<?php

//on demarre la session
session_start();

// on route vers le controleur approprié
if (!empty($_GET['page']) && is_file('controleur_'.$_GET['page'].'.php'))
{
      include 'controleur_'.$_GET['page'].'.php';
}

// pour la premiere arrivé sur le site
else
{
      include 'controleur_login.php';
}
// connection à la base de donnée.
  try
{
  $bdd = new PDO('mysql:host=localhost;dbname=Ownership;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
      die('Erreur : '.$e->getMessage());
}

 ?>
