<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Modification des tables</title>
	</head>
	<body>

		<?php 
	
		if (isset($_POST['acte'])){
			try {
			
			$connect = new PDO('mysql:host=localhost;dbname=Hopital;charset=utf8', 'root', '');
			
			
			$val1=$_POST['NumMed'];
			$val2=$_POST['NumPat'];
            $val3=$_POST['DateActe'];
            $val4=$_POST['NumService'];
			$val5=$_POST['Description'];
		
			$req = $connect->prepare('UPDATE acte SET NumService = :NumService, Description = :Description WHERE NumMed = :NumMed and NumPat = :NumPat and DateActe= :DateActe ');
			$req->execute(array('NumPat' => $val2,'DateActe' => $val3,'NumMed' => $val1, 'NumService' =>$val4, 'Description' =>$val5));
		
		echo "La table Acte a été modifiée, assurez-vous que la table Hospitalisation est à jour.";
		}
		 catch (mysqli_sql_exception $e) {
					die("DB ERROR: ". $e->getMessage());
				}
		$req->closeCursor();
		$connect = null;
		
		
		
		}
		
		
		if (isset($_POST['hospitalisation'])){
			try {
			
			$connect = new PDO('mysql:host=localhost;dbname=Hopital;charset=utf8', 'root', '');
			
			
			$val1=$_POST['NumPat'];
			$val2=$_POST['DateEntree'];
			$val3=$_POST['NumSalle'];
            $val4=$_POST['NumService'];
            $val5=$_POST['DateSortie'];
			
		
			$req = $connect->prepare('UPDATE hospitalisation SET NumPat = :NumPat, DateEntree = :DateEntree,NumSalle= :NumSalle, NumService=:NumService,DateSortie = :DateSortie WHERE NumPat = :NumPat and DateEntree=:DateEntree and NumSalle=:NumSalle');
			$req->execute(array('DateEntree' => $val2,'NumPat' => $val1, 'NumService' => $val4,'NumSalle' => $val3, 'DateSortie' =>$val5));

			echo "La table Hospitalisation a été modifiée, assurez-vous que les tables Acte et Service sont à jour.";
		}
		 catch (mysqli_sql_exception $e) {
					die("DB ERROR: ". $e->getMessage());
				}
		$req->closeCursor();
		$connect = null;

		}
		
		if (isset($_POST['infirmier'])){
			try {
			
			$connect = new PDO('mysql:host=localhost;dbname=Hopital;charset=utf8', 'root', '');
			
			
			$val1=$_POST['NumInf'];
			$val2=$_POST['Nom'];
			$val3=$_POST['Adresse'];
			$val4=$_POST['Telephone'];
		
			$req = $connect->prepare('UPDATE infirmier SET NumInf = :NumInf, Nom = :Nom, Adresse = :Adresse, Telephone =:Telephone WHERE NumInf = :NumInf');
			$req->execute(array(
			'Nom' => $val2,
			'NumInf' => $val1, 'Telephone' => $val4,
			'Adresse' => $val3
			));
			
			echo "La table Infirmier a été modifiée.";
			
		}
		 catch (mysqli_sql_exception $e) {
					die("DB ERROR: ". $e->getMessage());
				}
		$req->closeCursor();
		$connect = null;

		}
		
		if (isset($_POST['medecin'])){
			try {
			
			$connect = new PDO('mysql:host=localhost;dbname=Hopital;charset=utf8', 'root', '');
			
			
			$val1=$_POST['NumMed'];
			$val2=$_POST['Nom'];
			$val3=$_POST['Specialite'];
			
		
			$req = $connect->prepare('UPDATE medecin SET NumMed = :NumMed, Nom = :Nom, Specialite = :Specialite WHERE NumMed = :NumMed');
			$req->execute(array('Nom' => $val2,	'Specialite' => $val3,	'NumMed' => $val1	));
	
			echo "La table Medecin a été modifiée.";
			
		}
		 catch (mysqli_sql_exception $e) {
					die("DB ERROR: ". $e->getMessage());
				}
		$req->closeCursor();
		$connect = null;

		}
		
		if (isset($_POST['patient'])){
			try {
			
			$connect = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', '');
			
			
			$val1=$_POST['NumPat'];
			$val2=$_POST['Nom'];
			$val3=$_POST['Prenom'];
			$val4=$_POST['Mutuelle'];			
			
		
			$req = $connect->prepare('UPDATE patient SET Nom = :Nom, Prenom = :Prenom, NumPat = :NumPat, Mutuelle = :Mutuelle WHERE NumPat = :NumPat');
			$req->execute(array('Nom' => $val2,	'Prenom' => $val3,	'NumPat' => $val1,'Mutuelle' => $val4	));
	
			echo "La table Patient a été modifiée.";
			
		}
		 catch (mysqli_sql_exception $e) {
					die("DB ERROR: ". $e->getMessage());
				}
		$req->closeCursor();
		$connect = null;

		}
		if (isset($_POST['service'])){
			try {
			
			$connect = new PDO('mysql:host=localhost;dbname=Hopital;charset=utf8', 'root', '');
			
			
			$val1=$_POST['NumServ'];
			$val2=$_POST['nom'];
			$val3=$_POST['batiment'];
			$val4=$_POST['numMed'];			
			
		
			$req = $connect->prepare('UPDATE service SET nom = :nom, batiment = :batiment, NumServ =:NumServ, numMed = :numMed, WHERE NumServ = :Serv');
			$req->execute(array('nom' => $val2,	'batiment' => $val3,	'NumServ' => $val1,'numMed' => $val4	));
	
			echo "La table Service a été modifiée.";
			
		}
		 catch (mysqli_sql_exception $e) {
					die("DB ERROR: ". $e->getMessage());
				}
		$req->closeCursor();
		$connect = null;

		}
		if (isset($_POST['salle'])){
			try {
			
			$connect = new PDO('mysql:host=localhost;dbname=Hopital;charset=utf8', 'root', '');
			
			
			$val1=$_POST['NumSalle'];
			$val2=$_POST['NumService'];
			$val3=$_POST['NbLits'];
			$val4=$_POST['NumInf'];			
			
		
			$req = $connect->prepare('UPDATE salle SET NbLits = :NbLits, NumInf = :NumInf, NumService = :NumService, MNumSalle= :NumSalle WHERE NumService = :NumService and NumSalle =:NumSalle');
			$req->execute(array('NumService' => $val2,	'NbLits' => $val3,	'NumSalle' => $val1,'NumInf' => $val4	));
	
			echo "La table Salle a été modifiée.";
			
		}
		 catch (mysqli_sql_exception $e) {
					die("DB ERROR: ". $e->getMessage());
				}
		$req->closeCursor();
		$connect = null;

		}
		
		
	?>
	
	<html>
	 <p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
	 </html>