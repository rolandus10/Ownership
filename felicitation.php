<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="mycss.css">
    <meta name="viewport" content="width=device-width initial-scale=1" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <meta charset="utf-8">
    <title>Felicitation</title>
  </head>
    <body>

<?php
    echo '<p> Felicitation <strong>'.$_POST['prenom'].'</strong>  vous êtes inscrit sur <i class="text-warning">Owner</i><i class="text-success">ship</i></p>';
 ?>

 <form class="form-inline my-2 my-lg-0" action="index.php?page=login" method="post">
     <input class="btn btn-outline-success my-2 my-sm-0"  type="submit" value="login">
 </form>

  </body>
</html>
