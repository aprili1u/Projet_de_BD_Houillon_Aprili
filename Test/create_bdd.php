<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Création Base de données</title>
	</head>
	
	<body>
		<?php
	
			$user='newuser';
			$pass='newpass';
			$db="Hopital";
	
			if (isset($_POST['create'])){
				try {
					
					$connexion = mysqli_connect('localhost','root');
					
					$command="CREATE DATABASE $db";
					
					
					mysqli_query($connexion, $command);
					
					mysqli_select_db($connexion, 'Hopital');
					
					$command="CREATE TABLE acte (NumMed INTEGER, NumPat  INTEGER, DateActe  DATE, NumService INTEGER, Description  CHAR(30), PRIMARY KEY(NumMed, NumPat, DateActe))"; #verifier Description
					
					$result = mysqli_query($connexion, $command);
					
					
					$command="CREATE TABLE hospitalisation (NumPat INTEGER, DateEntree  DATE,NumSalle INTEGER, NumService INTEGER,DateSortie DATE,PRIMARY KEY(NumPat, DateEntree, NumSalle))";
					$result = mysqli_query($connexion, $command);	 
				
					
					$command="CREATE TABLE infirmier (NumInf INTEGER, Nom  CHAR(30), Adresse CHAR(30), Telephone CHAR(30) PRIMARY KEY(NumInf))";
					$result = mysqli_query($connexion, $command);	
					
					$command="CREATE TABLE medecin (NumMed INTEGER, Nom  CHAR(30), Specialite CHAR(30), PRIMARY KEY(NumMed))";
					$result = mysqli_query($connexion, $command);
					
					$command="CREATE TABLE patient (NumPat INTEGER, Nom CHAR(30), Prenom CHAR(30), Mutuelle  CHAR(30), PRIMARY KEY(NumPat))";
                    $result = mysqli_query($connexion, $command);
                    
                    $command="CREATE TABLE salle (NumSalle INTEGER, NumServ INTEGER, NbLits INTEGER, NumInf  INTEGER, PRIMARY KEY(NumSalle, NumServ))";
                    $result = mysqli_query($connexion, $command);
                    
                    $command="CREATE TABLE service (NumServ INTEGER, nom CHAR(30), batiment CHAR(30), NumMed INTEGER, PRIMARY KEY(NumServ))";
                    $result = mysqli_query($connexion, $command);
				
					echo "La base a été créée avec succès.";
					
					mysqli_close($connexion);

				} catch ( mysqli_sql_exception $e) {
					
					die("DB ERROR: ". $e->getMessage());
				}

			}
			
			if (isset($_POST['erase'])){
				
				try {
					
					$connexion = mysqli_connect('localhost','root');
					
					$command="DROP DATABASE $db";
					
					mysqli_query($connexion, $command);
		
					echo "La base a été supprimée avec succès.";
					
					mysqli_close($connexion);
					
				} catch (mysqli_sql_exception $e) {
					die("DB ERROR: ". $e->getMessage());
				}
			}
		
	

		?>
		
		<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
		
   
		
		
	</body>
	
</html>