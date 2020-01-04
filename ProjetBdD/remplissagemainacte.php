
   <html>
    <head>
    <title>Acte</title>
    </head>
    <body>
    <?php
    
    $base = new mysqli('localhost', 'root', '', 'Projet'); // On creer la connexion
	echo 'INSERT INTO acte VALUES ('.$_POST["NumMed"].','.$_POST["NumPat"].','.$_POST["DateActe"].','.$_POST["NumService"].','.$_POST["Description"].')';
	$requete = 'INSERT INTO acte VALUES ('.$_POST["NumMed"].','.$_POST["NumPat"].','.$_POST["DateActe"].','.$_POST["NumService"].','.$_POST["Description"].')';
	if ($base->query($requete)) {
    echo "Requete ajoutee avec succes. Vous allez etre redirigees vers la page d'ajout";
}
    ?>
	<meta http-equiv="refresh" content="4;URL=ajoutmanuel.html"> 
    </body>
    </html>