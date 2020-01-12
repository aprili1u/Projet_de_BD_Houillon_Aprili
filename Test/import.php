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
	$fichierCsvGraph="Acte.csv"; //valeur par défauts
		  

		switch ($table) // on indique sur quelle variable on travaille
		{ 
			case "Acte" : 
				$fichierCsvGraph="Acte.csv";
			break;
			
			case "Hospitalisation": 
				$fichierCsvGraph="Hospitalisation.csv";
			break;
			
			case "Infirmier": 
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

            case "Service":
                $fichierCsvGraph="Service.csv";
            break;
			
		
		}


		// Récupère une ressource sur le fichier CSV
		$fileGraph = new SplFileObject($fichierCsvGraph);
		$fileGraph->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY);
		$fileGraph->setCsvControl($separateur);
		  
		// Pour avoir un code générique, on génère les marqueurs en fonction du nombre de champs :
		//graphe
		$tab_champsGraph = $fileGraph->current();
		$champs_insertGraph = array_fill(0,count($tab_champsGraph),'?');
		$champs_insertGraph = implode(',',$champs_insertGraph);
		 
		
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=Hopital', 'root', '');
		  
			$ReqInsertGraph = "INSERT INTO $table VALUES($champs_insertGraph)";
			$insertionGraph = $bdd->prepare($ReqInsertGraph);
	 
			// pour ne pas insérer la première ligne si elle contient les entêtes de colonnes
			$fileGraph->next();
			
			while($rowGraph = $fileGraph->current()){ 
		
				for ($i=0;$i<count($rowGraph);$i++){
					if ($rowGraph[$i]=="NULL"){
						$rowGraph[$i]=NULL;
					}
					
				}
				
				$insertionGraph->execute($rowGraph);
				$fileGraph->next();
				
			}
			echo "La table a été remplie avec succès.";
		  
		}
		catch(PDOException $e)
		{
			die('Erreur : '.$e->getMessage());
		} 
		 ?>
		 
		 <p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
</body> 
</html>