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

case "Question4" : 
     $request="SELECT P.Numservice,S.Nbtlit-P.Nbpat FROM 
     (SELECT Numservice,COUNT(Numpat) AS Nbpat FROM Hospitalisation 
     WHERE Numservice = (SELECT Numservice FROM Service WHERE Nom='Cardiologie') 
     AND Dateentree < DATE '04/07/2018' AND Datesortie > DATE '04/07/2018' GROUP BY Numservice) 
     AS P JOIN (SELECT Numservice,SUM(Nblits)AS Nbtlit FROM salle GROUP BY Numservice AS S) ON P.Numservice=S.Numservice";
     $reponse = $bdd->query($request);
     echo "P.Numservice,S.Nbtlit-P.Nbpat";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . ' , ' ;
          echo $donnees[1] .'<br />';
     }
$reponse->closeCursor();
break;

case "Question5" : 
     $request="SELECT Numpat FROM Hospitalisation WHERE NOT Numservice = (SELECT Numservice FROM Service WHERE Nom='Cardiologie')";
     $reponse = $bdd->query($request);
     echo "Numpat";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . '<br />';
     }
$reponse->closeCursor();
break;
case "Question6" : 
     $request="SELECT DISTINCT Numpat FROM Acte AS ac1 WHERE NOT EXISTS (SELECT * FROM Service AS ser 
     WHERE NOT EXISTS (SELECT * FROM Acte AS ac WHERE ac.Numpat=ac1.Numpat AND ser.Numservice=ac.Numservice))";
     $reponse = $bdd->query($request);
     echo "Numpat";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . '<br />';
     }
$reponse->closeCursor();
break;

case "Question7" : 
     $request="SELECT Med.Nummed,Med.specialite,Ac.Numpat 
     FROM Medecin AS Med JOIN Acte AS Ac ON Med.Nummed = Ac.Nummed WHERE Ac.Numpat = 
     (SELECT DISTINCT Numpat FROM Acte AS ac1 WHERE NOT EXISTS (SELECT * FROM Service AS ser WHERE NOT EXISTS 
     (SELECT * FROM Acte AS ac WHERE ac.Numpat=ac1.Numpat AND ser.Numservice=ac.Numservice)))";
     $reponse = $bdd->query($request);
     echo "Med.Nummed,Med.specialite,Ac.Numpat";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . ',';
          echo $donnees[1] . ',';
          echo $donnees[2] . '<br />';
     }
$reponse->closeCursor();
break;

case "Question8" : 
     $request="SELECT Numpat FROM Hospitalisation WHERE DATEDIFF(Datesortie,Dateentree)>=14";
     $reponse = $bdd->query($request);
     echo "Numpat";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . '<br />';
     }
$reponse->closeCursor();
break;

case "Question9" : 
     $request="SELECT DISTINCT Numpat FROM Acte WHERE Numpat NOT IN (SELECT A.Numpat FROM Acte AS A JOIN hospitalisation AS H ON A.Numpat=H.Numpat AND A.Numservice=H.Numservice AND A.Dateacte!=H.Dateentree)";
     $reponse = $bdd->query($request);
     echo "Numpat";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . '<br />';
     }
$reponse->closeCursor();
break;

case "Question10" : 
     $request="SELECT DISTINCT A.Numpat FROM Acte AS A WHERE A.Numpat NOT IN (SELECT H.Numpat FROM Hospitalisation AS H)";
     $reponse = $bdd->query($request);
     echo "A.Numpat";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . '<br />';
     }
$reponse->closeCursor();
break;

case "Question11" : 
     $request="SELECT A.Numpat,A.Numservice FROM Acte AS A JOIN (SELECT COUNT(Numpat) AS cnt,Numpat FROM Acte GROUP BY Numpat) AS B ON A.Numpat=B.Numpat WHERE B.cnt=1";
     $reponse = $bdd->query($request);
     echo "A.Numpat,A.NumService";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . ',';
          echo $donnees[1] . '<br />';
     }
$reponse->closeCursor();
break;

case "Question12" : 
     $request="SELECT A.Numservice FROM (SELECT COUNT(H.Numpat) AS C, H.Numservice FROM Hospitalisation 
     AS H WHERE DATEDIFF(Datesortie,Dateentree)>=2 GROUP BY H.Numservice) AS A JOIN (SELECT COUNT(H1.Numpat)/2 
     AS MOITIE,H1.Numservice FROM Hospitalisation AS H1 GROUP BY H1.Numservice) 
     AS B ON A.Numservice=B.Numservice WHERE A.C >= B.MOITIE";
     $reponse = $bdd->query($request);
     echo "A.Numservice";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . '<br />';
     }
$reponse->closeCursor();
break;

case "Question13" : 
     $request="SELECT H.Numpat FROM Hospitalisation AS H JOIN (SELECT Mutuelle,Numpat FROM Patient) AS P ON H.Numpat=P.Numpat 
     WHERE DATEDIFF(H.Datesortie,H.Dateentree)>=3 AND P.Mutuelle!='MUT'";
     $reponse = $bdd->query($request);
     echo "A.Numpat";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . '<br />';
     }
$reponse->closeCursor();
break;

case "Question14" : 
     $request="SELECT COUNT(DISTINCT Numpat),Nummed FROM Acte GROUP BY Nummed";
     $reponse = $bdd->query($request);
     echo "COUNT(DISTINCT Numpat),Nummed";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . ',';
          echo $donnees[1] . '<br />';
     }
$reponse->closeCursor();
break;

case "Question15" : 
     $request="SELECT COUNT(Numpat),Dateacte FROM Acte GROUP BY Dateacte";
     $reponse = $bdd->query($request);
     echo "COUNT(Numpat),Dateacte";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] . ',';
          echo $donnees[1] . '<br />';
     }
$reponse->closeCursor();
break;

case "Requête1" : 
     $request="SELECT nom from infirmier as inf join salle as sa on inf.NumInf=sa.NumInf WHERE
      NumServ = (Select distinct Numserv from salle join service as se on se.NumService=NumServ Where se.nom='Cardiologie') and adresse='Nancy'";
     $reponse = $bdd->query($request);
     echo "nom";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] .  '<br />';
     }
$reponse->closeCursor();
break;

case "Requête2" : 
     $request="SELECT NumPat FROM Patient as pa join hospitalisation as hos on pa.NumPat=hos.NumPat where datediff(hos.datesortie,hos.dateentree)=1 ";
     $reponse = $bdd->query($request);
     echo "NumPat";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] .  '<br />';
     }
$reponse->closeCursor();
break;

case "Requête3" : 
     $request="SELECT count( distinct NumSalle) from salle as sa join service as se on sa.numserv=numserv where (se.nom='cancerologie')";
     $reponse = $bdd->query($request);
     echo "count( distinct NumSalle)";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] .  '<br />';
     }
$reponse->closeCursor();
break;

case "Requête4" : 
     $request="SELECT NumInf from salle where numServ=1";
     $reponse = $bdd->query($request);
     echo "count( distinct NumSalle)";
     while ($donnees = $reponse->fetch())
     {
          echo $donnees[0] .  '<br />';
     }
$reponse->closeCursor();
break;
}
?>

<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>
</html>