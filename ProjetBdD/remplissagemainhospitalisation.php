
   <html>
    <head>
    <title>Acte</title>
    </head>
    <body>
    <?php
    
    $base = new mysqli('localhost', 'root', '', 'Projet'); // On creer la connexion
	echo 'INSERT INTO hospitalisation VALUES ('.$_POST["NumPat"].','.$_POST["DateEntree"].','.$_POST["NumSalle"].','.$_POST["NumService"].','.$_POST["DateSortie"].')';
	$requete = 'INSERT INTO hospitalisation VALUES ('.$_POST["NumPat"].','.$_POST["DateEntree"].','.$_POST["NumSalle"].','.$_POST["NumService"].','.$_POST["DateSortie"].')';
	if ($base->query($requete)) {
    echo "Requete ajoutee avec succes. Vous allez etre redirigees vers la page d'ajout";
}
    ?>
	<meta http-equiv="refresh" content="4;URL=ajoutmanuel.html"> 
    </body>
    </html>