<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remplissage Manuel Table Infirmier</title>
	</head>
	<body>
	
			<h3> Renseignez ici la ligne à ajouter : </h3>
			<form method="post" action="infirmier.php">
								<table>
									<tr>
										<th>NumInf</th>
										<th>Nom</th>
										<th>Adresse</th>
										<th>Telephone</th>
									</tr>
									<tr>
										<td> <input type="number" name="NumInf" /> </td>
										<td> <input type="text" name="Nom" /> </td>
										<td> <input type="text" name="Adresse" /> </td>
										<td> <input type="text" name="Telephone" /> </td>
										
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
							
							$requete->execute(array($_POST['NumInf'], $_POST['Nom'], $_POST['Adresse'],$_POST['Telephone']));
							
							echo "La ligne a été ajoutée avec succès." ;
							}
						?>
						
						<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
</body>
	</html>		