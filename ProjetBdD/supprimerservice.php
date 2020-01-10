<?php
    
    $base = new mysqli('localhost', 'root', '', 'Projet'); // On creer la connexion
	echo 'INSERT INTO salle VALUES ('.$_POST["NumSalle"].','.$_POST["NumServ"].','.$_POST["NbLits"].','.$_POST["NumInf"].')';
	$requete = 'INSERT INTO salle VALUES ('.$_POST["NumSalle"].','.$_POST["NumServ"].','.$_POST["NbLits"].','.$_POST["NumInf"].')';
	if ($base->query($requete)) {
    echo "Requete ajoutee avec succes. Vous allez etre redirigees vers la page d'ajout";
}
    ?>