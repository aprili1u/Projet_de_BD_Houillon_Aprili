<?php
extract(filter_input_array(INPUT_POST));
$fichier=$_FILES["userfile"]["name"];
	if ($fichier) {
$fp= fopen($_FILES["userfile"]["tmp_name"],"r");}
else {    ?>
Importation echouee 
<?php exit() ;}


$c=0 ;?>
Importation reussie
<?php 
while (!feof($fp)){
$ligne =fgets($fp,4096);
$liste= explode(";",$ligne) ;
$table = filter_input(INPUT_POST,'userfile');
$liste[0] = (isset($liste[0])) ? $liste[0] : Null;
$liste[1] = (isset($liste[1])) ? $liste[1] : Null;
$liste[2] = (isset($liste[2])) ? $liste[2] : Null;
$liste[3] = (isset($liste[3])) ? $liste[3] : Null;
$champs1=$liste[0];
$champs2=$liste[1];
$champs3=$liste[2];
$champs4=$liste[3];
echo "INSERT INTO salle VALUES ($champs1,'$champs2','$champs3',$champs4);" ;
if ($champs1!='')
{
	$c++;
	$db = new mysqli('localhost','root','','Projet') ;
	$sql =("INSERT INTO infirmier VALUES ($champs1,'$champs2','$champs3',$champs4);");
	$resul= $db ->query($sql);
}}
fclose($fp);
?>