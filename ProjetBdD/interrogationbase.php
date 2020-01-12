



<?php
try
{
	
	$bdd = new mysqli('localhost', 'root', '', 'Projet');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


$question=$_GET['id'];

switch($question)

{case "Question1" : 

	$reponse = $bdd->query('SELECT Numpat FROM hospitalisation WHERE DateEntree="2018-12-05"');
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>  Quels sont les patients entrés à une date que l’on saisit </p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";


	while ($row = msql_fetch_array($reponse, MSQL_NUM)) {
		echo $row['NumPat'] . ': ' . $row['NumPat'] . "\n";
	}
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				<td><?php echo $row['NumPat']; ?></td>
							
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Question2" : 
	$reponse = $bdd->query('SELECT `nom_auteur`,`prenom_auteur`,`naissance`,`deces`,`nationalite` FROM `auteur`');
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>  La liste de tous les auteurs (nom_auteur, prénom_auteur, naissance,
décès, nationalité) </p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				<td><?php echo $row['nom_auteur']; ?></td>
							<td><?php echo $row['prenom_auteur']; ?></td>
							<td><?php echo $row['naissance']; ?></td> 
							<td><?php echo $row['deces']; ?></td> 
							<td><?php echo $row['nationalite']; ?></td> 
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Question3" :

	$reponse = $bdd->query('SELECT nom_editeur,site_web FROM editeur');
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>   La liste de tous les éditeurs (nom_editeur, site_web) </p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				<td><?php echo $row['nom_editeur']; ?></td>
							<td><?php echo $row['site_web']; ?></td>
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Question4" : 
	$reponse = $bdd->query('SELECT titre_livre, nom_editeur from livre join edite_par on edite_par.id_livre=livre.id_livre join editeur on edite_par.id_editeur=editeur.id_editeur');
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>  Le titre et le nom de l’éditeur de tous les livres</p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";


	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				<td><?php echo $row['titre_livre']; ?></td>
							<td><?php echo $row['nom_editeur']; ?></td>
									</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Question5" :
	$reponse = $bdd->query("SELECT livre.titre_livre, auteur.nom_auteur, auteur.prenom_auteur, editeur.nom_editeur 
							FROM `livre` 
							INNER JOIN `ecrit_par` ON ecrit_par.id_livre=livre.id_livre 
							INNER JOIN `edite_par` ON edite_par.id_livre=livre.id_livre 
							INNER JOIN `auteur` ON auteur.id_auteur=ecrit_par.id_auteur 
							INNER JOIN `editeur` ON editeur.id_editeur=edite_par.id_editeur ");
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>   Le titre, l’auteur et l’éditeur de tous les livres</p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				
		<td><?php echo $row['titre_livre']; ?></td>	
		<td><?php echo $row['nom_auteur']; ?></td>
		<td><?php echo $row['prenom_auteur']; ?></td>
		<td><?php echo $row['nom_editeur']; ?></td>			
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;


case "Question6" : 
	$reponse = $bdd->query("SELECT titre_livre FROM `livre` join ecrit_par on livre.id_livre = ecrit_par.id_livre join auteur on ecrit_par.id_auteur = auteur.id_auteur WHERE nom_auteur = 'Asimov' and prenom_auteur='Isaac'");
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>  Le titre des livres dont l’auteur est "Isaac Asimov" </p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				
		<td><?php echo $row['titre_livre']; ?></td>							
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Question7":
	$reponse = $bdd->query("SELECT DISTINCT nom_auteur 
FROM `auteur` 
WHERE id_auteur = (SELECT id_auteur FROM `ecrit_par` 
					INNER JOIN `edite_par` ON ecrit_par.id_livre=edite_par.id_livre 
					INNER JOIN `editeur` ON editeur.id_editeur=edite_par.id_editeur WHERE editeur.nom_editeur='J''ai Lu')");
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>   Le nom des auteurs (sans doublons) publiés par l’éditeur "J’ai Lu"  </p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				
		<td><?php echo $row['nom_auteur']; ?></td>							
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Question8" : 
	$reponse = $bdd->query("SELECT COUNT(ecrit_par.id_auteur) as nb from ecrit_par JOIN auteur on ecrit_par.id_auteur=auteur.id_auteur where nom_auteur='Nothomb' and prenom_auteur='Amelie'");
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>  Le nombre de livres écrits par "Amélie Nothomb" </p>
		
	<?php 

	
	$row = $reponse->fetch();
	echo $row['nb'];
	
	

$reponse->closeCursor(); 
break;

case "Question9" :
	$reponse = $bdd->query("SELECT nom_editeur, COUNT(DISTINCT id_livre) as nb
							FROM `edite_par`
							INNER JOIN `editeur` ON editeur.id_editeur=edite_par.id_editeur
							GROUP BY editeur.id_editeur ")
?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>   Le nombre de livres publiés par Editeur </p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				
		<td><?php echo $row['nom_editeur']; ?></td>	
		<td><?php echo $row['nb']; ?></td>		
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Question10" : 
	$reponse = $bdd->query("SELECT DISTINCT titre_livre FROM `livre` join ecrit_par on livre.id_livre = ecrit_par.id_livre join auteur on ecrit_par.id_auteur = auteur.id_auteur WHERE genre = 'science-fiction' AND NOT (nom_auteur = 'Asimov' AND prenom_auteur='Isaac')  ");
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>  Les livres de science-fiction n’ayant pas été écrits par "Asimov Isaac"</p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>
		<td><?php echo $row['titre_livre']; ?></td>							
		</tr>
	   </p>
	<?php
	}
	$reponse->closeCursor(); 
break;

case "Question11" :
	$reponse = $bdd->query(" SELECT nom_editeur,nom_auteur, prenom_auteur 
							FROM `Auteur` 
							INNER JOIN `ecrit_par` ON auteur.id_auteur=ecrit_par.id_auteur 
							INNER JOIN `edite_par` ON ecrit_par.id_livre=edite_par.id_livre 
							INNER JOIN `editeur` ON editeur.id_editeur=edite_par.id_editeur 
							GROUP BY edite_par.id_editeur ")
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>   Les auteurs publiés par les mêmes éditeurs </p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				
		<td><?php echo $row['nom_editeur']; ?></td>			
		<td><?php echo $row['nom_auteur']; ?></td>	
		<td><?php echo $row['prenom_auteur']; ?></td>			
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

	case "Question12" : 
	$reponse = $bdd->query("SELECT DISTINCT titre_livre 
							FROM `livre` 
							join ecrit_par on livre.id_livre = ecrit_par.id_livre 
							join auteur on ecrit_par.id_auteur = auteur.id_auteur 
							join edite_par on edite_par.id_livre = livre.id_livre 
							join editeur on edite_par.id_editeur=editeur.id_editeur
							WHERE ( nom_auteur ='Asimov' AND prenom_auteur='Isaac' AND genre = 'science-fiction' AND nature='nouvelle') 
							AND NOT editeur.nom_editeur ='Gallimard'");
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>  Les nouvelles de science-fiction écrites par "Asimov Isaac" et non éditées par "Gallimard"</p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>
		<td><?php echo $row['titre_livre']; ?></td>							
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Question13" :

	$reponse = $bdd->query(" SELECT titre_livre 
							FROM livre 
							INNER JOIN `ecrit_par` ON livre.id_livre=ecrit_par.id_livre 
							INNER JOIN `auteur` ON auteur.id_auteur=ecrit_par.id_auteur 
							WHERE auteur.deces IS NOT NULL ")
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>   Les livres écrits par des auteurs décédés </p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				
		<td><?php echo $row['titre_livre']; ?></td>							
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Question14" : 
	$reponse = $bdd->query("SELECT DISTINCT nom_auteur, prenom_auteur FROM `auteur` join ecrit_par on auteur.id_auteur = ecrit_par.id_auteur join livre on ecrit_par.id_livre = livre.id_livre GROUP BY nom_auteur having COUNT(DISTINCT(nature))>1");
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>  Les auteurs ayant écrit des livre de natures différentes</p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>
		<td><?php echo $row['nom_auteur']; ?></td>
		<td><?php echo $row['prenom_auteur']; ?></td>				
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Question15" :

	$reponse = $bdd->query("SELECT nom_auteur,prenom_auteur 
							FROM `auteur` INNER JOIN ( SELECT id_auteur, COUNT(id_livre) nbr 
														FROM `ecrit_par` GROUP BY id_auteur ) S 
							ON S.id_auteur=auteur.id_auteur 
							WHERE nbr >1  ")
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>   Les auteurs ayant écrit au moins deux livres
 </p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>				
		<td><?php echo $row['nom_auteur']; ?></td>
		<td><?php echo $row['prenom_auteur']; ?></td>			
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;

case "Requête1" : 
	$reponse = $bdd->query("SELECT nom_editeur FROM `editeur` join edite_par on edite_par.id_editeur=editeur.id_editeur  join livre on livre.id_livre = edite_par.id_livre join ecrit_par on ecrit_par.id_livre = livre.id_livre  join auteur on ecrit_par.id_auteur=auteur.id_auteur where nationalite='russe'");
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>   Éditeurs publiant des auteurs russes</p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>
		<td><?php echo $row['nom_editeur']; ?></td>
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;


case "Requête2" : 
	$reponse = $bdd->query("SELECT COUNT(DISTINCT(nom_editeur)) as nb FROM `editeur` join edite_par on edite_par.id_editeur=editeur.id_editeur join livre on livre.id_livre = edite_par.id_livre join ecrit_par on ecrit_par.id_livre = livre.id_livre join auteur on ecrit_par.id_auteur=auteur.id_auteur where nom_auteur='Asimov'AND prenom_auteur='Isaac'");
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>  Nombre d’éditeurs différents ayant publié Isaac Asimov</p>
		
	<?php 

	
	$row = $reponse->fetch();
	echo $row['nb'];
	
	

$reponse->closeCursor(); 
break;

case "Requête3":
	
	$reponse = $bdd->query("SELECT nom_editeur 
							FROM `editeur` 
							INNER JOIN `edite_par` ON editeur.id_editeur=edite_par.id_editeur 
							INNER JOIN `ecrit_par` ON edite_par.id_livre=ecrit_par.id_livre 
							INNER JOIN `auteur`ON ecrit_par.id_auteur=auteur.id_auteur 
							WHERE auteur.deces IS NULL")
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>   Liste des éditeurs publiant des auteurs non décédés</p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>
		<td><?php echo $row['nom_editeur']; ?></td>
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;



case "Requête4":

	$reponse = $bdd->query("SELECT nom_editeur, parution 
							FROM `editeur` 
							INNER JOIN `edite_par` ON editeur.id_editeur=edite_par.id_editeur 
							INNER JOIN `livre` ON edite_par.id_livre=livre.id_livre
							WHERE (1940<=parution AND parution<=1960 AND nature='roman') ")
	?>
	
	<p>
		<strong>Requête  <?php echo $question ?> :  </strong>   Liste des éditeurs et année des romans publiés entre 1940 et 1960  </p>
		
	<?php 
	echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";

	
	while ($row = $reponse->fetch())
	{
	?>
		<p>
		<tr>
		<td><?php echo $row['nom_editeur']; ?></td>
		<td><?php echo $row['parution']; ?></td>
		</tr>
	   </p>
	<?php
	}

$reponse->closeCursor(); 
break;








}

?>

			<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
