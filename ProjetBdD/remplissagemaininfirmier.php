
   <html>
    <head>
    <title>Infirmier</title>
    </head>
    <body>
    <?php
    
    $base = new mysqli('localhost', 'root', '', 'Projet'); // On creer la connexion
	echo 'INSERT INTO infirmier VALUES ('.$_POST["NumInf"].','.$_POST["Nom"].','.$_POST["Adresse"].','.$_POST["Telephone"].')';
	$requete = 'INSERT INTO infirmier VALUES ('.$_POST["NumInf"].','.$_POST["Nom"].','.$_POST["Adresse"].','.$_POST["Telephone"].')';
	if ($base->query($requete)) {
    echo "Requete ajoutee avec succes. Vous allez etre redirigees vers la page d'ajout";
}

    ?>
	
	<meta http-equiv="refresh" content="4;URL=ajoutmanuel.html"> 
    </body>
    </html>