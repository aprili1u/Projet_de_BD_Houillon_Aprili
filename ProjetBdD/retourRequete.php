<?php

$base = new mysqli('localhost', 'root', '', 'Projet'); // On creer la connexion
$requete= $_POST["Requete"];

echo $base->query($requete)  ;

?>