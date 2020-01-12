<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Modifications </title>
	</head>
	
	<body>
	
		<?php
					
 //connection a la base
    try
    {
		$connect = new PDO('mysql:host=localhost;dbname=Hopital;charset=utf8', 'root', '');

    }
    catch (Exception $e)
    {
//en cas d'erreur on affiche un message et on arrete tout
        die('Erreur : ' . $e->getMessage());
		
    }
	
	
	
	$table=$_GET['table'];

	
	switch($table)
	
	{ case 'Acte' : 
		$NumMed=$_GET['nmed'];
		$NumPat=$_GET['npat'];
		$DateActe=$_GET['acte'];
        $NumService=$_GET['nservi'];
        $Description=$_GET['des']
				?>
							<html>
							<form method="post" action="modif_table.php">
															
								<h2>Renseignez ici les modifications à apporter :</h2>
								
								<table>
									<tr>
										<th>NumMed</th>
										<th>NumPat</th>
                                        <th>DateActe</th>
										
									</tr>
									<tr>

										<td> <input type="number" name="NumMed"  value="<?php echo $NumMed ?>"/> </td>
										<td> <input type="number" name="NumPat" value="<?php echo $NumPat ?>" /> </td>
                                        <td> <input type="date" name="DateActe" value="<?php echo $DateActe ?>" /> </td>
										<input type="hidden" name="nserv" value="<?php echo $nserv ?>" />
											<input type="hidden" name="des" value="<?php echo $des ?>" />

										
									</tr>
								</table>

								
								
							
	
							<input type="submit" value="Valider" name="acte"> 
							</body>
						</form>
						
							
	<?php break ; 
	
	case 'Hospitalisation' : 
		$NumPat=$_GET['npat'];
		$DateEntree=$_GET['de'];
		$NumSalle=$_GET['ns'];
        $NumService=$_GET['nserv'];
        $DateSortie=$_GET['ds'];
				?>
							<html>
							<form method="post" action="modif_table.php">
							
								
								<h2>Renseignez ici les modifications à apporter :</h2>
								
								<table>
									<tr>
										<th>NumPat</th>
										<th>DateEntree</th>
                                        <th>NumSalle</th>
                                        <th>NumServ</th>
                                        <th>DateSortie</th>
										
									</tr>
									<tr>

										<td> <input type="number" name="NumPat"  value="<?php echo $NumPat ?>"/> </td>
										<td> <input type="date" name="DateEntree" value="<?php echo $DateEntree ?>" /> </td>
										<td> <input type="number" name="NumSalle"  value="<?php echo $NumSalle ?>"/> </td>
                                        <td> <input type="number" name="NumServ"  value="<?php echo $NumServ ?>"/> </td>
                                        <td> <input type="date" name="DateSortie" value="<?php echo $DateSortie ?>" /> </td>
										
									</tr>
								</table>

								
								
							
	
							<input type="submit" value="Valider" name="hospitalisation"> 
							</body>
						</form>

						</html>
	<?php break ; 
	
	case 'Infirmier' :
	$NumInf=$_GET['ninf'];
	$Nom=$_GET['nm'];
    $Adresse=$_GET['ad'];
    $Telephone=$_GET['tel'];




				?>
							<html>
							<form method="post" action="modif_table.php">
							
								<h2>Renseignez ici les modifications à apporter </h2>
							
									<table>
									<tr>
										<th>NumInf</th>
                                        <th>Nom</th>
                                        <th>Adresse</th>
                                        <th>Telephone</th>
										
									</tr>
									<tr>
										
										<td> <input type="number" name="NumInf"  value="<?php echo $NumInf ?>"/> </td>
                                        <td> <input type="text" name="Nom"  value="<?php echo $Nom ?>"/> </td>
                                        <td> <input type="text" name="Adresse"  value="<?php echo $Adresse ?>"/> </td>
										<td> <input type="text" name="Telephone"  value="<?php echo $Telephone ?>"/> </td>
										
										
									</tr>
								</table>
								
							<input type="submit" value="Valider" name="infirmier">
							</body>
	
					</html>
					<?php
	break ;
	
	case 'Medecin' :
	$NumMed=$_GET['nmed'];
	$Nom=$_GET['nm'];
	$Specialite=$_GET['spe'];

	$parution = (int)$parution
				?>
							<html>
							<form method="post" action="modif_table.php">
							
								
								<h2>Renseignez ici les modifications à apporter </h2>

								
								<table>
									<tr>
										<th>NumMed</th>
                                        <th>Nom</th>
                                        <th>Specialite</th>
										
									</tr>
									<tr>
										
										<td> <input type="number" name="NumMed"  value="<?php echo $NumMed ?>"/> </td>
										<td> <input type="text" name="Nom" value="<?php echo $Nom ?> "/> </td>
										
										<td> <input type="text" name="Specialite" value="<?php  echo $parution ?> "/> </td>
											
									
										
									</tr>
								</table>
								
							<input type="submit" value="Valider" name="medecin">
							</body>
	
					</html>
					<?php
	break ;
	case 'Patient' :
	$NumPat=$_GET['npat'];
	$Nom=$_GET['nm'];
	$Prenom=$_GET['pm'];
	$Mutuelle=$_GET['mu'];
	

				?>
							<html>
							<form method="post" action="modif_table.php">
							
								<h2>Renseignez ici les modifications à apporter </h2>

								<table>
									<tr>
										<th>NumPat</th>
										<th>Nom</th>
										<th>Prenom</th>
										<th>Mutuelle</th>
										
										
									</tr>
									<tr>
										
										<td> <input type="number" name="NumPat"  value="<?php echo $NumPat ?>"/> </td>
										<td> <input type="text" name="Nom" value="<?php echo $Nom ?> "/> </td>
										<td> <input type="text" name="Prenom" value="<?php echo $Prenom ?> "/> </td>
										<td> <input type="text" name="Mutuelle" value="<?php echo $Mutuelle?> "/> </td>
										
										
									</tr>
								</table>
								
							<input type="submit" value="Valider" name="patient">
							</body>
	
					</html>
					<?php
    break ;
    
    case 'Service' :
        $NumServ=$_GET['nserv'];
        $nom=$_GET['nm'];
        $batiment=$_GET['bat'];
        $numMed=$_GET['nmed'];
        
    
                    ?>
                                <html>
                                <form method="post" action="modif_table.php">
                                
                                    <h2>Renseignez ici les modifications à apporter </h2>
    
                                    <table>
                                        <tr>
                                            <th>NumServ</th>
                                            <th>nom</th>
                                            <th>batiment</th>
                                            <th>numMed</th>
                                            
                                            
                                        </tr>
                                        <tr>
                                            
                                            <td> <input type="number" name="NumServ"  value="<?php echo $NumServ ?>"/> </td>
                                            <td> <input type="text" name="nom" value="<?php echo $nom ?> "/> </td>
                                            <td> <input type="text" name="batiment" value="<?php echo $batiment ?> "/> </td>
                                            <td> <input type="number" name="numMed" value="<?php echo $numMed?> "/> </td>
                                            
                                            
                                        </tr>
                                    </table>
                                    
                                <input type="submit" value="Valider" name="service">
                                </body>
        
                        </html>
                        <?php
        break ;

        case 'Salle' :
            $NumSalle=$_GET['nsal'];
            $NumService=$_GET['nserv'];
            $NbLits=$_GET['nlit'];
            $NumInf=$_GET['ninf'];
            
        
                        ?>
                                    <html>
                                    <form method="post" action="modif_table.php">
                                    
                                        <h2>Renseignez ici les modifications à apporter </h2>
        
                                        <table>
                                            <tr>
                                                <th>NumSalle</th>
                                                <th>NumService</th>
                                                <th>NbLits</th>
                                                <th>NumInf</th>
                                                
                                                
                                            </tr>
                                            <tr>
                                                
                                                <td> <input type="number" name="NumSalle"  value="<?php echo $NumSalle ?>"/> </td>
                                                <td> <input type="number" name="NumService" value="<?php echo $NumService ?> "/> </td>
                                                <td> <input type="number" name="NbLits" value="<?php echo $NbLits ?> "/> </td>
                                                <td> <input type="number" name="NumInf" value="<?php echo $NumInf?> "/> </td>
                                                
                                                
                                            </tr>
                                        </table>
                                        
                                    <input type="submit" value="Valider" name="salle">
                                    </body>
            
                            </html>
                            <?php
            break ;
	}
	?>