<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remplissage Base de données</title>
	</head>
	
	<body>

<?php

	$table = $_POST['choix'];
	$separateur = ';';
	$fichierCsvGraph="Acte.csv";
	$db='Hopital';
	
	

		switch ($table) // on indique sur quelle variable on travaille
		{ 
			case "Acte" : 
				$fichierCsvGraph="Acte.csv";
			break;
			
			case "Hospitalisation": // dans le cas où $note vaut 5
				$fichierCsvGraph="Hospitalisation.csv";
			break;
			
			case "Infirmier": // dans le cas où $note vaut 7
				$fichierCsvGraph="Infirmier.csv";
			break;
			
			case "Medecin":
				$fichierCsvGraph="Medecin.csv";
			break;
			
			case "Patient":
				$fichierCsvGraph="Patient.csv";
			break;
            
            case "Salle":
                $fichierCsvGraph="Salle.csv";
            break;

            case"Service":
                $fichierCsvGraph="Service.csv";
            break;
            
		
		}
		
		
		$connexion = mysqli_connect('localhost','root','','Livre');
		
		$stmt = mysqli_prepare($connexion, "INSERT INTO table VALUES (v)");
		
		mysqli_stmt_bind_param(stmt,);
		$stmt->bindParam(':value', $value);
		
		
		$ligne= 1;
		
		$file=fopen($fichierCsvGraph,"r");
		
		
		
		while($tab=fgetcsv($file,1024,';')){
			if ($ligne==1){ //on commence à la deuxième ligne car les entêtes sont déjà dans la table
				$ligne++;
			}
			else {
				
				
				$champs=count($tab);
				$valeurs=array_fill(0,$champs,'?');
				$ligne++;
				for ($i=0;$i<$champs;$i++){
					$valeurs[$i]=$tab[$i];
				}
				$valeurs=implode(',',$valeurs);
			
				echo $valeurs;
				
			
				$result=mysqli_query($connexion,$command);
					
			
			}
		}
		
		mysqli_close($connexion);
		

		
		 ?>
		 
</body> 
</html>