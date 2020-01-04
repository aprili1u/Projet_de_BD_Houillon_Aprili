<?php
extract(filter_input_array(INPUT_POST));
$fichier=$_FILES["userfile"]["name"];
	if ($fichier) {
$fp= fopen($_FILES["userfile"]["tmp_name"],"r");}
else {    ?>
Importation echouee 
<?php exit() ;}


;?>
Importation reussie
<?php 
$c=0 ;
while (!feof($fp) ){
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

$c++;
if ($champs1!='' and $c>1)
{
	
	$db = new mysqli('localhost','root','','Projet') ;
	$sql =("INSERT INTO service VALUES ($champs1,'$champs2','$champs3',$champs4);");
	$resul= $db ->query($sql);
}$c++;
}
fclose($fp);
?>