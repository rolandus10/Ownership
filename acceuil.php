<!DOCTYPE html>

<html>
  <head>
   <meta charset="utf-8">
   <link rel="stylesheet" href="mycss.css">
  </head>

  <body>
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
			  <li><a href="aliments.html">Aliment</a></li>
		   </ul>
		 </li>
		 <li class ="acceuil-groupe"><a href="groupes.html">Groupes</a></li>
         <li class ="acceuil-profil"><a href="utilisateur.html">Profil</a></li>
		 <li class ="acceuil-contact"><a href="contact.html">Contact</a></li>
		 <li class="acceuil-recherche"><a>Recherche <input type="search" /></a></li>
		</ul>
     </nav>
     <table>
       <caption> Vos vetements </caption>

        <tr>
            <th>Type</th>
            <th>Description</th>
            <th>Couleur</th>
            <th>Quantité</th>
         </tr>

     <?php
     while($data = $resultat_data->fetch()){
        echo '<tr>
            <td>'; echo  $data['type']; echo'</td>
            <td>'; echo $data['description'];echo '</td>
            <td>'; echo $data['couleur'];echo '</td>
            <td>'; echo $data['quantite'];echo '</td>
        </tr>';
     }
     ?>
     </table>
  </body>
</html>
