<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remplissage Manuel Table Acte</title>
	</head>
	<body>
	
			<h3> Renseignez ici la ligne à ajouter : (attention pour les dates, respectez le format aaaa-mm-jj)</h3>
			<form method="post" action="acte.php">
								<table>
									<tr>
										<th>NumMed</th>
										<th>NumPat</th>
										<th>DateActe</th>
										<th>NumService</th>
										<th>Description</th>
									</tr>
									<tr>
										<td> <input type="number" name="NumMed" /> </td>
										<td> <input type="number" name="NumPat" /> </td>
										<td> <input type="date" name="DateActe" /> </td>
										<td> <input type="number" name="NumService" /> </td>
										<td> <input type="text" name="Description" /> </td>
										
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
							
							$requete->execute(array($_POST['NumMed'], $_POST['NumPat'], $_POST['DateActe'],$_POST['NumService'],
							$_POST['Description']));
							
							echo "La ligne a été ajoutée avec succès." ;
							}
						?>
						
						<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
</body>
	</html>							
						