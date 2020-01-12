

<?php
// Creer la base et les tables
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

//Il manque les keys etrangeres
$Service = 'CREATE TABLE Service (
NumService INT(6) PRIMARY KEY,
Nom VARCHAR(30) NOT NULL,
Batiment VARCHAR(6) NOT NULL,
NumMed INT(6)
) ';

$Salle ='CREATE TABLE Salle (
NumSalle INT(6) ,
NumServ INT(6) NOT NULL,
Nblits INT(6) NOT NULL ,
NumInf INT(6),
constraint pk_t primary key (NumSalle, NumServ)
) ' ;

$Infirmier = 'CREATE TABLE Infirmier (
NumInf INT(6) PRIMARY KEY,
Nom VARCHAR(30),
Adresse VARCHAR(50),
Telephone INT(10) ) ' ;

$Patient='CREATE TABLE Patient (
NumPat INT(6) PRIMARY KEY,
Nom VARCHAR(30),
Prenom VARCHAR(50),
Mutuelle VARCHAR(3) ) ' ;

$Medecin = 'CREATE TABLE Medecin (
NumMed INT(6) PRIMARY KEY,
Nom VARCHAR(30),
Specialite VARCHAR(30) ) ' ;

$Hospitalisation = 'CREATE TABLE Hospitalisation(
NumPat INT(6) ,
DateEntree DATETIME ,
NumSalle INT(6) ,
NumService INT(6),
DateSortie DATETIME,
constraint pk_t primary key (NumPat, DateEntree,NumSalle) 
) ' ;

$Acte='CREATE TABLE Acte(
NumMed INT(6)  ,
NumPat INT(6) ,
DateActe VARCHAR(30) ,
NumService INT(6),
Description VARCHAR(50),
constraint pk_t primary key (NumMed, NumPat,DateActe) ) ' ;

$base = new mysqli('localhost', 'root', '', 'Projet'); // On creer la connexion
if ($base->query($Service)) {
    echo "Table Service created successfully";
}
if ($base->query($Salle)) {
    echo "Table Salle created successfully";
}
if ($base->query($Infirmier)) {
    echo "Table Inf created successfully";
}
if ($base->query($Patient)) {
    echo "Table Pat created successfully";
}
if ($base->query($Medecin)) {
    echo "Table Med created successfully";
}
if ($base->query($Hospitalisation)) {
    echo "Table hos created successfully";
}

if ($base->query($Acte)) {
    echo "Table Acte created successfully";
}
$base->close();
  //header('Location: http://localhost/ProjetBdD/');
 // Redirige vers la page de creation de Bdd (pour le style)
  //exit();

?>