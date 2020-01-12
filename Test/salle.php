<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Remplissage Manuel Table Salle</title>
	</head>
	<body>
	
			<h3> Renseignez ici la ligne à ajouter : </h3>
			<form method="post" action="salle.php">
								<table>
									<tr>
										<th>NumSalle</th>
										<th>NumService</th>
										<th>NbLits</th>
										<th>NumInf</th>

									</tr>
									<tr>
										<td> <input type="number" name="NumSalle" /> </td>
										<td> <input type="number" name="NumService" /> </td>
										<td> <input type="number" name="NbLits" /> </td>
										<td> <input type="number" name="NumInf" /> </td>
										
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
							
							$requete->execute(array($_POST['NumSalle'], $_POST['NumService'], $_POST['NbLits'],$_POST['NumInf']));
							
							echo "La ligne a été ajoutée avec succès." ;
							}
						?>
						
						<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
</body>
	</html>	