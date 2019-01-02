<!DOCTYPE html>

<html>
  <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="mycss.css">
  </head>
     <nav>
	   <ul>
         <li class ="acceuil-stocker"><a href="stocker.html">Sauvegarder nouveau produit</a>
		   <ul class="submenu">
		     <li><a href="svetements.html">Vêtement</a></li>
			 <li><a href="sobjets_de_valeur.html">Objet de valeur</a></li>
			 <li><a href="saliments.html">Aliment</a></li>
		   </ul>
		 </li>
         <li class ="acceuil-consulter"><a href="categories.html">Consulter les produits sauvegardés</a>
		   <ul class="submenu">
		      <li><a href="vetements.html">Vêtement</a></li>
			  <li><a href="objets_de_valeur.html">Objet de valeur</a></li>
			  <li><a href="aliment.html">Aliment</a></li>
		   </ul>
		 </li>
		 <li class ="acceuil-groupe"><a href="groupes.html">Groupes</a></li>
         <li class ="acceuil-profil"><a href="utilisateur.html">Profil</a></li>
		 <li class ="acceuil-contact"><a href="contact.html">Contact</a></li>
		 <li class="acceuil-recherche"><a>Recherche <input type="search" /></a></li>
		</ul>
     </nav>

     <table>
       <caption> Vos aliments </caption>

        <tr>
            <th>Nom</th>
            <th>type</th>
            <th>date de peremption</th>
            <th>Quantité</th>
         </tr>

     <?php
     while($data = $resultat_data->fetch()){

       //crée un objet dateTime a partir de la  valeur de la date de peremption
       $date1=(new DateTime($data['date_peremption'].' 00:01:00'));
       //echo $date1;
       $date2=new DateTime("now");
       $intervalle=$date1->diff($date2);

       //echo $intervalle->days;
        echo '<tr>
            <td>'; echo  $data['Nom']; echo'</td>
            <td>'; echo $data['type'];echo '</td>
            <td>'; echo $intervalle->days;echo '</td>
            <td>'; echo $data['quantite'];echo '</td>
        </tr>';
     }
     ?>

     <form class="" action="index.php?page=aliment" method="post">
         <label for="nom">supprimer un aliment: </label><input type="text" name="nom_aliment"><br>
         <input type="submit" value="supprimer">
     </form>
</html>
