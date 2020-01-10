<html>

<?php
$base = new mysqli('localhost', 'root', '', 'Projet');

/* Vérification de la connexion */
if (mysqli_connect_errno()) {
    printf("Échec de la connexion : %s\n", $mysqli->connect_error);
    exit();
}

$query = "SELECT * from service";
$c=0;
if ($result = $base->query($query)) {

    /* Récupère un tableau associatif */
    while ($row = $result->fetch_assoc()) {
        echo   ' '.$row["NumService"].' '.$row["Nom"].' ' .$row["Batiment"].' '.$row["NumMed"].' </br>' ;
		
		
    }

    /* Libération des résultats */
    $result->free();
}

/* Fermeture de la connexion */
$base->close();
?>


