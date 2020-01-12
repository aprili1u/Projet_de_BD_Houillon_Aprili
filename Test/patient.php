<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remplissage Manuel Table Patient</title>
	</head>
	<body>
	
			<h3> Renseignez ici la ligne à ajouter : </h3>
			<form method="post" action="patient.php">
								<table>
									<tr>
										<th>NumPat</th>
										<th>Nom</th>
										<th>Prenom</th>
										<th>Mutuelle</th>
									</tr>
									<tr>
										<td> <input type="number" name="NumPat" /> </td>
										<td> <input type="text" name="Nom" /> </td>
										<td> <input type="text" name="Prenom" /> </td>
										<td> <input type="text" name="Mutuelle" /> </td>
										
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
								
							$requete=$connexion->prepare('INSERT INTO Acte VALUES(?,?,?,?)');
							
							$requete->execute(array($_POST['NumPat'], $_POST['Nom'], $_POST['Prenom'],$_POST['Mutuelle']));
							
							echo "La ligne a été ajoutée avec succès." ;
							}
						?>
						
						<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
</body>
	</html>	