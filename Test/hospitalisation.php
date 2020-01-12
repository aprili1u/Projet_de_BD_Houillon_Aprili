<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remplissage Manuel Table Hospitalisation</title>
	</head>
	<body>
	
			<h3> Renseignez ici la ligne à ajouter : (attention pour les dates, respectez le format aaaa-mm-jj)</h3>
			<form method="post" action="hospitalisation.php">
								<table>
									<tr>
										<th>NumPat</th>
										<th>DateEntree</th>
										<th>NumSalle</th>
										<th>NumService</th>
										<th>DateSortie</th>
									</tr>
									<tr>
										<td> <input type="number" name="NumPat" /> </td>
										<td> <input type="date" name="DateEntree" /> </td>
										<td> <input type="number" name="NumSalle" /> </td>
										<td> <input type="number" name="NumService" /> </td>
										<td> <input type="date" name="DateSortie" /> </td>
										
									</tr>
								</table>
								<p>
							<input type="submit" value="Valider" name="line">
						<p>
						</form>
				
						<?php
		
							if (isset($_POST['line'])){
								
								try {
									$connexion = new PDO('mysql:host=localhost;dbname=Hopital', 'root', '');
								}
								catch(PDOException $e) {
									die('Erreur : '.$e->getMessage());
								} 
								
							$requete=$connexion->prepare('INSERT INTO Acte VALUES(?,?,?,?,?)');
							
							$requete->execute(array($_POST['NumPat'], $_POST['DateEntree'], $_POST['NumSalle'],$_POST['NumService'],
							$_POST['DateSortie']));
							
							echo "La ligne a été ajoutée avec succès." ;
							}
						?>
						
						<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
</body>
	</html>		