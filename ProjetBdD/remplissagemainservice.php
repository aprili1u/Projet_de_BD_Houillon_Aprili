
   <html>
    <head>
    <title>Service</title>
    </head>
    <body>
    <?php
    
    $base = new mysqli('localhost', 'root', '', 'Projet'); // On creer la connexion
	echo 'INSERT INTO service VALUES ('.$_POST["NumService"].','.$_POST["Nom"].','.$_POST["Batiment"].','.$_POST["NumMed"].')';
	$requete = 'INSERT INTO service VALUES ('.$_POST["NumService"].','.$_POST["Nom"].','.$_POST["Batiment"].','.$_POST["NumMed"].')';
	if ($base->query($requete)) {
    echo "Requete ajoutee avec succes. Vous allez etre redirigees vers la page d'ajout";
}
    ?>
	<meta http-equiv="refresh" content="4;URL=ajoutmanuel.html"> 
    </body>
    </html>