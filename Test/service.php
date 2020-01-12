<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remplissage Manuel Table Service</title>
	</head>
	<body>
	
			<h3> Renseignez ici la ligne à ajouter : </h3>
			<form method="post" action="service.php">
								<table>
									<tr>
										<th>NumServ</th>
										<th>nom</th>
										<th>batiment</th>
										<th>numMed</th>
									</tr>
									<tr>
										<td> <input type="number" name="NumServ" /> </td>
										<td> <input type="text" name="nom" /> </td>
										<td> <input type="text" name="batiment" /> </td>
										<td> <input type="number" name="numMed" /> </td>
										
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
							
							$requete->execute(array($_POST['NumServ'], $_POST['nom'], $_POST['batiment'],$_POST['numMed']));
							
							echo "La ligne a été ajoutée avec succès." ;
							}
						?>
						
						<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
</body>
	</html>	