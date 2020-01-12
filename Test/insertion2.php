
<?php
 
 // Connexion a la base de données
     $connect = new PDO('mysql:host=localhost;dbname=livre;charset=utf8', 'root', '');
 
     $table = $_POST['choix3'];
     switch ($table)
     
     { 
             case "Acte" : 
                 // création des requetes
             $sql="SELECT*FROM acte";
             echo "<html><body><div align=\"center\">" ;
             echo "<h1>Table Acte</h1><br><br><br>" ;
              
             // envoie de la requête et retour
             $resultat = $connect->query($sql);
             if($resultat)
             {
                 echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";
             while($row=$resultat->fetch())
                 {?>
                         <tr>
                         <td><?php echo $row['NumMed']; ?></td>
                         <td><?php echo $row['NumPat']; ?></td>
                         <td><?php echo $row['DateActe']; ?></td> 
                         <td><?php echo $row['NumService']; ?></td>
                         <td><?php echo $row['Description']; ?></td>
                         
                         <td><a href="modification.php?nmed=<?php echo $row['NumMed']?>&npat=<?php echo $row['NumPat']?>&acte=<?php echo $row['DateActe']?>
                         &nservi=<?php echo $row['NumService']?>&des=<?php echo $row['Description']?>&table=<?php echo $table?> ">Modifier</a></td>
 
                         <td><a href="suppr.php?nmed=<?php echo $row['NumMed']?>&npat=<?php echo $row['NumPat']?>&acte=<?php echo $row['DateActe']?>&table=<?php echo $table?>">Supprimer</a></td>
                         </tr>
                         <?php
             }}
             break;
             
             case "Hospitalisation" : 
                 // création des requetes
             $sql="SELECT*FROM Hospitalisation";
             echo "<html><body><div align=\"center\">" ;
             echo "<h1>Table Hospitalisation</h1><br><br><br>" ;
              
             // envoie de la requête et retour
             $resultat = $connect->query($sql);
             if($resultat)
             {
                 echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";
             while($row=$resultat->fetch())
                 {?>  
                         <tr>
                         <td><?php echo $row['NumPat']; ?></td>
                         <td><?php echo $row['DateEntree']; ?></td>
                         <td><?php echo $row['NumSalle']; ?></td>
                         <td><?php echo $row['NumService']; ?></td>
                         <td><?php echo $row['DateSortie']; ?></td> 
 
                         <td><a href="modification.php?npat=<?php echo $row['NumPat']?>&de=<?php echo $row['DateEntree'] ?>&ns=<?php echo $row['NumSalle'] ?>&nse=<?php echo $row['NumService'] ?>&ds=<?php echo $row['DateSortie'] ?>&table=<?php echo $table?>">Modifier</a></td>
 
                         <td><a href="suppr.php?npat=<?php echo $row['NumPat']?>&de=<?php echo $row['DateEntree'] ?>&ns=<?php echo $row['NumSalle'] ?>&table=<?php echo $table ?>">Supprimer</a></td>
                         </tr>
                         <?php
             }}
             break;
             
             case "Infirmier" : 
                 // création des requetes
             $sql="SELECT*FROM infirmier";
             echo "<html><body><div align=\"center\">" ;
             echo "<h1>Table Infirmier</h1><br><br><br>" ;
              
             // envoie de la requête et retour
             $resultat = $connect->query($sql);
             if($resultat)
             {
                 echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";
             while($row=$resultat->fetch())
                 {?>  
                         <tr>
                         <td><?php echo $row['NumInf']; ?></td>
                         <td><?php echo $row['Nom']; ?></td>
                         <td><?php echo $row['Adresse']; ?></td>
                         <td><?php echo $row['Telephone']; ?></td>
                         
                         
                         <td><a href="modification.php?ninf=<?php echo $row['NumInf']?>&nm=<?php echo $row['Nom'] ?>&ad=<?php echo $row['Adresse'] ?>&tel=<?php echo $row['Telephone'] ?>&table=<?php echo $table?>">Modifier</a></td>
 
                         <td><a href="suppr.php?ninf=<?php echo $row['NumInf'] ?>&table=<?php echo $table?>">Supprimer</a></td>
                         </tr>
                         <?php
             }}
             break;
             
             case "Medecin" : 
                             // création des requetes
                         $sql="SELECT*FROM medecin";
                         echo "<html><body><div align=\"center\">" ;
                         echo "<h1>Table Medecin</h1><br><br><br>" ;
                          
                         // envoie de la requête et retour
                         $resultat = $connect->query($sql);
                         if($resultat)
                         {
                             echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";
                         while($row=$resultat->fetch())
                             {?>  
                                     <tr>
                                     <td><?php echo $row['NumMed']; ?></td>
                                     <td><?php echo $row['Nom']; ?></td>
                                     <td><?php echo $row['Specialite']; ?></td>
                                     
                                     <td><a href="modification.php?nmed=<?php echo $row['NumMed']?>&nm=<?php echo $row['Nom'] ?>&spe=<?php echo $row['Specialite'] ?>&table=<?php echo $table?>">Modifier</a></td>
 
                                     <td><a href="suppr.php?nmed=<?php echo $row['NumMed']?>&table=<?php echo $table?>">Supprimer</a></td>
                                     </tr>
                                     <?php
                         }}
                         break;
             
             case "Patient" : 
                 // création des requetes
             $sql="SELECT*FROM patient";
 
             echo "<html><body><div align=\"center\">" ;
             echo "<h1>Table Patient</h1><br><br><br>" ;
              
             // envoie de la requête et retour
             $resultat = $connect->query($sql);
             if($resultat)
             { 
                 echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";
             while($row=$resultat->fetch())
                 {	  
                     ?>  
                         <tr>
                         <td><?php echo $row['NumPat']; ?></td>
                         <td><?php echo $row['Nom']; ?></td>
                         <td><?php echo $row['Prenom']; ?></td>
                         <td><?php echo $row['Mutuelle']; ?></td>
 
                         
                         <td><a href="modification.php?npat=<?php echo $row['NumPat']?>&nm=<?php echo $row['Nom'] ?>&pm=<?php echo $row['Prenom'] ?>&mu=<?php echo $row['Mutuelle'] ?>&table=<?php echo $table?>">Modifier</a></td>
 
                         <td><a href="suppr.php?npat=<?php echo $row['NumPat']?>&table=<?php echo $table?>">Supprimer</a></td>
                         </tr>
                         <?php
             }}
            break;     
            case "Salle" : 
                // création des requetes
            $sql="SELECT*FROM salle";

            echo "<html><body><div align=\"center\">" ;
            echo "<h1>Table Salle</h1><br><br><br>" ;
             
            // envoie de la requête et retour
            $resultat = $connect->query($sql);
            if($resultat)
            { 
                echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";
            while($row=$resultat->fetch())
                {	  
                    ?>  
                        <tr>
                        <td><?php echo $row['NumSalle']; ?></td>
                        <td><?php echo $row['NumService']; ?></td>
                        <td><?php echo $row['NbLits']; ?></td>
                        <td><?php echo $row['NumInf']; ?></td>

                        
                        <td><a href="modification.php?nsal=<?php echo $row['NumSalle']?>&nserv=<?php echo $row['NumService'] ?>&nlit=<?php echo $row['NbLits'] ?>&ninf=<?php echo $row['NumInf'] ?>&table=<?php echo $table?>">Modifier</a></td>

                        <td><a href="suppr.php?nsal=<?php echo $row['NumSalle']?>&nserv=<?php echo $row['NumService'] ?>&table=<?php echo $table?>">Supprimer</a></td>
                        </tr>
                        <?php
            }}
           break; 


           case "Service" : 
            // création des requetes
        $sql="SELECT*FROM service";

        echo "<html><body><div align=\"center\">" ;
        echo "<h1>Table Service</h1><br><br><br>" ;
         
        // envoie de la requête et retour
        $resultat = $connect->query($sql);
        if($resultat)
        { 
            echo "<table align='center' border=1 cellspacing=3 cellpadding=0>";
        while($row=$resultat->fetch())
            {	  
                ?>  
                    <tr>
                    <td><?php echo $row['NumServ']; ?></td>
                    <td><?php echo $row['nom']; ?></td>
                    <td><?php echo $row['batiment']; ?></td>
                    <td><?php echo $row['numMed']; ?></td>

                    
                    <td><a href="modification.php?npat=<?php echo $row['NumServ']?>&nm=<?php echo $row['nom'] ?>&bat=<?php echo $row['batiment'] ?>&nmed=<?php echo $row['numMed'] ?>&table=<?php echo $table?>">Modifier</a></td>

                    <td><a href="suppr.php?nserv=<?php echo $row['NumServ']?>&table=<?php echo $table?>">Supprimer</a></td>
                    </tr>
                    <?php
        }}
       break;  
         
                 
 }
 $connect= null;
 
 ?>	