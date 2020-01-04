


<?php
$link = mysqli_connect('localhost', 'root', '');
if (!$link) {
    die('Connexion impossible : ' . mysql_error());
}

$sql = 'CREATE DATABASE Projet';
if (mysqli_query ($link,$sql)) {
    echo "Base de donnees creee correctement\n";
} else {
    echo 'Erreur lors de la création de la base de données : ' . mysql_error() . "\n";
}
//5 a 15 creer BDD
  header('Location: http://localhost/ProjetBdD/');
 // Redirige vers la page de creation de Bdd (pour repeter le processus)
  exit();

?>
