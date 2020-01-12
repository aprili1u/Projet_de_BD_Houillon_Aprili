<!DOCTYPE html>
<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=Projet', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$question=$_GET['id'];

switch($question)

{case "Question1" : 

$request= "SELECT Numpat FROM Hospitalisation WHERE Dateentree='2018-12-05'";
$reponse = $bdd->query($request);
echo "Numpat : "; 
while ($donnees = $reponse->fetch())
{
     echo $donnees[0] . '<br />';
}
  
$reponse->closeCursor();
break;

case "Question2" : 
$request="SELECT M.Nummed FROM Service AS S JOIN Medecin AS M ON M.Nummed=S.Nummed WHERE M.specialite='Cancerologue'";
$reponse = $bdd->query($request);
echo "M.Nummed";
while ($donnees = $reponse->fetch())
{
     echo $donnees[0] . '<br />';
}
  
$reponse->closeCursor();
break;
case "Question2" : 
$request="SELECT M.Nummed FROM Service AS S JOIN Medecin AS M ON M.Nummed=S.Nummed WHERE M.specialite='Cancerologue'";
$reponse = $bdd->query($request);
echo "M.Nummed";
while ($donnees = $reponse->fetch())
{
     echo $donnees[0] . '<br />';
}
  
$reponse->closeCursor();
break;
case "Question3" : 
$request="SELECT NumServ,SUM(Nblits) FROM salle GROUP BY NumServ";
$reponse = $bdd->query($request);
echo "Numserv, SUM(NbLits)";
while ($donnees = $reponse->fetch())
{	
     echo $donnees[0] .' , ' ; #0 est le premier champ de donnees ie Numserv
	 echo $donnees[1] . '<br />' ;
}
  
$reponse->closeCursor();
break;


}
?>

<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
</html>