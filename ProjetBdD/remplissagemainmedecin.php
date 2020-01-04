
   <html>
    <head>
    <title>Medecin</title>
    </head>
    <body>
    <?php
    
    $base = new mysqli('localhost', 'root', '', 'Projet'); // On creer la connexion
	echo 'INSERT INTO medecin VALUES ('.$_POST["NumMed"].','.$_POST["Nom"].','.$_POST["Specialite"].')';
	$requete = 'INSERT INTO medecin VALUES ('.$_POST["NumMed"].','.$_POST["Nom"].','.$_POST["Specialite"].')';
	if ($base->query($requete)) {
    echo "Requete ajoutee avec succes. Vous allez etre redirigees vers la page d'ajout";
}
    ?>
	<meta http-equiv="refresh" content="4;URL=ajoutmanuel.html"> 
    </body>
    </html>