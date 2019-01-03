<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width initial-scale=1" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <title>Vetement</title>
  </head>

  <body>

<!bloc1>

<nav class="navbar navbar-light navbar-expand-lg " style="background-color:#000000">
  <div class="col-lg-5">

    <div>
      <form action="index.php?page=search" class="form-inline my-2 my-lg-0" method="post">
        <input class="form-control mr-sm-2" type="search" name="Mot" placeholder="Search" aria-label="Search">
        <input value="search" class="btn btn-outline-success my-2 my-sm-0" type="submit"></button>
      </form>
  </div>
  </div>

  <div class="col-lg-5">
  <a class="navbar-brand" href="index.php?page=retour"><h1><b><i class="text-warning">Owner</i><i class="text-success">ship</i></b></h1></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
  </button>
</div>

  <div class="col-lg-2">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <!<div class="container">
          <!<div class="row">
            <!<div class="col-lg-1  col-xs-1">
        <a class="nav-link" href="#"><h3><b><p class="text-success">Profil</p></h3><!<img src="C:\Users\SONY\Desktop\Bootstrapimages\profil2.png" class="img-responsive   img-circle" alt="..."> <span class="sr-only">(current)</span></a>
            <!</div>
         <!</div>
       <!</div>

      </li>
    </ul>
  </div>

</nav>


<div class="container-fluid" style="background-color: #1C1C1C">
  <div class="row">
    <div class="col-sm">
      <!première colonne>
    </div>

    <div class="col-sm">
      <nav class="navbar navbar-light navbar-expand-lg" >

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            <li class="nav-item">
              <a class="nav-link  text-light" href="index.php?page=retour">Acceuil</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="index.php?page=aliment_view">Aliments</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="index.php?page=objet_valeur_view">Objets de valeur</a>
            </li>

          </ul>
        </div>
      </nav>

    </div>

    <div class="col-sm">
      <!troisième colonne>

    </div>
  </div>
</div>




<!bloc2>

  <div class="container ">
    <p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p><p>
<legend><b><i class="text-success"><h3><u>VOS VETEMENTS</u></h3></i></b></legend>
<form class="form-inline my-2 my-lg-0" action="index.php?page=vetements" method="post">
    <input class="form-control mr-sm-2" placeholder="supprimer un objet" type="text" name="nom_vetement"><br>
    <input class="btn btn-outline-danger my-2 my-sm-0"  type="submit" value="supprimer">
</form><br>
    <table class="table table-hover  table table-borderless">
      <thead class="thead-dark">
      <tr>
        <th scope="col">Nom</th>
        <th scope="col">couleur</th>
        <th scope="col">description</th>
        <th scope="col">type</th>
      </tr>
      <?php
      while($data = $resultat_data->fetch()){
        echo '<tr>
            <td>'; echo  $data['Nom']; echo'</td>
            <td>';echo $data['couleur'];echo '</td>
            <td>';echo $data['description'];echo '</td>
            <td>';echo $data['type'];echo '</td>
        </tr>';
      }
    ?>

    </tbody>
  </table>
</div>

<div class="container">
  <div class="row">
    <div class="col-sm">

    </div>
    <div class="col-sm">
      <form action="vetement.html" class="form-inline my-2 my-lg-0">
        <input value="Nouveau vetement" class="btn btn-outline-success my-2 my-sm-0" type="submit"></input>
      </form>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>



  </body>
</html>
