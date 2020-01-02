<?php
//Supp la base
$sqls = 'DROP DATABASE Projet';
$link = mysqli_connect('localhost', 'root', '');
if (mysqli_query ($link,$sqls)) {
    echo "Base de donnees supprimee correctement\n";
} else {
    echo 'Erreur lors de la suppression de la base de données : ' . mysql_error() . "\n";
// supprime la BDD
 header('Location: http://localhost/ProjetBdD/');
 // Redirige vers la page de creation de Bdd (pour repeter le processus)
  exit();
}