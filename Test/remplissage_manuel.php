<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remplissage Manuel</title>
	</head>
	
	<body>
	
		<?php
		
		if (isset($_POST['rempm'])){
		
			$table = $_POST['choix2'];
			
			try
			{	
				$bdd = new PDO('mysql:host=localhost;dbname=Hopital', 'root', '');
			}
			catch(Exception $e) 
			{
				die('Erreur : '.$e->getMessage());
			}
		  

			switch ($table) // on indique sur quelle variable on travaille
			{ 
				case "Acte" : 
					$requete= "SELECT column_name FROM information_schema.columns WHERE table_name='Acte'";
				break;
			
				case "Hospitalisation": 
					$requete= "SELECT column_name FROM information_schema.columns WHERE table_name='Hospitalisation'";
				break;
			
				case "Infirmier":
					$requete= "SELECT column_name FROM information_schema.columns WHERE table_name='Infirmier'";
				break;
			
				case "Medecin":
					$requete= "SELECT column_name FROM information_schema.columns WHERE table_name='Medecin'";
				break;
			
				case "Patient":
					$requete= "SELECT column_name FROM information_schema.columns WHERE table_name='Patient'";
                break;

                case "Salle":
					$requete= "SELECT column_name FROM information_schema.columns WHERE table_name='Salle'";
                break;
                
                case "Service":
					$requete= "SELECT column_name FROM information_schema.columns WHERE table_name='Service'";
				break;
			
		
		}
			
			//$requete = "SELECT column_name FROM information_schema.columns WHERE table_name='Auteur'";
			
			$requetep= $bdd->prepare($requete);
			
			$requetep->execute();
			
			$i=0;
			
			while ($data = $requetep->fetch(PDO::FETCH_ASSOC)) {
				
				
				
				echo $data['column_name'] ;
				
				?>
						
							<form method="post" action="remplissage_manuel.php">
								<table>
									<tr>
										<th><?php $data['column_name'] ?></th>
									</tr>
									<tr>
										<td> <input type="text" name=<?php (string)$i ?> /> </td>
									</tr>
								</table>
				
			<?php 
							$i++;
				
			}
			
			?>
			
			
			<input type="submit" value="Valider" name="line">
					</body> 
						</html>
			
			<?php
			
		}
		
			
			if (isset($_POST['line'])){
			
			/*try
				{
				$bdd = new PDO('mysql:host=localhost;dbname=Hopital', 'root', '');
				}
					
				catch(PDOException $e)
				{
					die('Erreur : '.$e->getMessage());
				} 
			
			*/ 
			
			$j=0;
			
			while ($_POST[(string)$j]){
					
				$valeurs[$j]=$_POST[(string)$j];
				
				$j++;
			}	
			
			$champs = array_fill(0,$j,'?');
				
			$champs = implode(',',$champs);
		  
			$requete = "INSERT INTO $table VALUES($champs)";	
			
			$requetep= $bdd->prepare($requete);
			
			$requetep->execute($valeurs);
			
			}
			
					
			
			?>