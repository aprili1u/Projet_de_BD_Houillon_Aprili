<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Projet Base de données</title>
	</head>
	
	<form method="post" action="create_bdd.php">
	<p>
	
		<h1 style="background-color:powderblue;">
		 Projet Base de données </h1>
		 
		<div style="height:20px;display:block;"> </div>
		
		<input type="submit" value="Créer la base de données" name="create">
		
		<form method="post" action="create_bdd.php">
	
		<input type="submit" value="Supprimer la base de données" name="erase">
	
	</form>
		 
		<div style="height:20px;display:block;"> </div>
	</form>
	
	<p>
	
	
	
	<h2>
	Remplissage automatique des tables </h2>
		
		
	<form method="post" action="import.php">
	
	Choix de la table: 
		
		<select name="choix">
			<option value="Acte">Acte</option>
			<option value="Hospitalisation">Hospitalisation</option>
			<option value="Infirmier">Infirmier</option>
			<option value="Medecin">Medecin</option>
			<option value="Patient">Patient</option>
			<option value="Salle">Salle</option>
			<option value="Service">Service</option>
		</select>

		<input type="submit" value="Valider" name="remp">
		
		<div style="height:50px;display:block;"> </div>
		
	</form>
	
	
	<h2> Remplissage manuel des tables </h2>
		
		
	<form method="post" action="index.php">
		
		Choix de la table: 
				
				<select name="choix2">
					<option value="Acte">Acte</option>
					<option value="Hospitalisation">Hospitalisationr</option>
					<option value="Infirmier">Infirmier</option>
					<option value="Medecin">Medecin</option>
					<option value="Patient">Patient</option>
					<option value="Salle">Salle</option>
					<option value="Service">Service</option>
				</select>
				
			<input type="submit" value="Valider" name="remp_manuel">
				
			
		</form>
		
	<?php 
	
	
	
	
		if (isset($_POST['remp_manuel'])){
			
			$table=$_POST['choix2'];
			
			switch ($table) // on indique sur quelle variable on travaille
			{ 
				case "Acte" : 
					header('Location: http://localhost/Test/acte.php');
					exit();
					//break;
			
			
				case "Hospitalisation": 
					header('Location: http://localhost/Test/hospitalisation.php');
					exit();
			
			
				case "Infirmier":
					header('Location: http://localhost/Test/infirmier.php');
					exit();
			
			
				case "Medecin":
					header('Location: http://localhost/Test/medecin.php');
					exit();
			
			
				case "Patient":
					header('Location: http://localhost/Test/patient.php');
					exit();

				case "Salle":
					header('Location: http://localhost/Test/salle.php');
					exit();

				case "Service":
					header('Location: http://localhost/Test/service.php');
					exit();
			}
		}

		
		
	?>
		
		 
		<div style="height:50px;display:block;"> </div>
	
	<h2> Modification des tables </h2>

	
	
	<form method="post" action="insertion2.php">
		
		Choix de la table: 
				
				<select name="choix3">
					<option value="Acte">Acte</option>
					<option value="Hospitalisation">Hospitalisationr</option>
					<option value="Infirmier">Infirmier</option>
					<option value="Medecin">Medecin</option>
					<option value="Patient">Patient</option>
					<option value="Salle">Salle</option>
					<option value="Service">Service</option>
				
				</select>
				
			<input type="submit" value="Valider" name="rempm">
				
			
		</form>
		
	
	<div style="height:50px;display:block;"> </div>
	
	
	<h1 style="background-color:powderblue;">
	 Interrogation de la base </h1>
		
		1 - La liste de tous les livres (titre_livre, genre, parution, nature, langue)  &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question1"?>">Réponse</a></td>

<p> 2 - La liste de tous les auteurs (nom_auteur, prénom_auteur, naissance,décès, nationalité) &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question2"?>">Réponse</a></td>

<p>3 - La liste de tous les éditeurs (nom_editeur, site_web) &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question3"?>">Réponse</a></td>

<p> 4 - Le titre et le nom de l’éditeur de tous les livres &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question4"?>">Réponse</a></td>

<p> 5 - Le titre, l’auteur et l’éditeur de tous les livres &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question5"?>">Réponse</a></td>

<p> 6 - Le titre des livres dont l’auteur est "Isaac Asimov" &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question6"?>">Réponse</a></td>

<p> 7 - Le nom des auteurs (sans doublons) publiés par l’éditeur "J’ai Lu" &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question7"?>">Réponse</a></td>

<p> 8 - Le nombre de livres écrits par "Amélie Nothomb" &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question8"?>">Réponse</a></td>

<p> 9 - Le nombre de livres publiés par Editeur &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question9"?>">Réponse</a></td>

<p> 10 - Les livres de science-fiction n’ayant pas été écrit par "Asimov Isaac" &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question10"?>">Réponse</a></td>

<p> 11 - Les auteurs publiés par les mêmes éditeurs &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question11"?>">Réponse</a></td>

<p> 12 - Les nouvelles de science-fiction écrites par "Asimov Isaac" et non éditées
par "Gallimard" &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question12"?>">Réponse</a></td>

<p> 13 - Les livres écrits par des auteurs décédés &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question13"?>">Réponse</a></td>
	
<p> 14 - Les auteurs ayant écrits des livres de natures différentes &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question14"?>">Réponse</a></td>

<p> 15 - Les auteurs ayant écrits au moins deux livres &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Question15"?>">Réponse</a></td>

<p>  Requête supplémentaire 1 : Éditeurs publiant des auteurs russes &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Requête1"?>">Réponse</a></td>

<p>  Requête supplémentaire 2 : Nombre d’éditeurs différents ayant publié Isaac Asimov &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Requête2"?>">Réponse</a></td>

<p> Requête supplémentaire 3 : Liste des éditeurs publiant des auteurs non décédés &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Requête3"?>">Réponse</a></td>

<p> Requête supplémentaire 4 : Liste des éditeurs et année des romans publiés entre 1940 et 1960 &nbsp;
<td><a href="interrogationbase.php?id=<?php echo "Requête4"?>">Réponse</a></td>

	
</body> 
</html>