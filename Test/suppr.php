<?php
 //connection a la base
    try
    {
		$connect = new PDO('mysql:host=localhost;dbname=Hopital;charset=utf8', 'root', '');
		$table = $_GET['table'];
		
		switch($table)
	
			{ case "Acte" :
            $id = (!empty($_GET['nmed']))? intval($_GET['nmed']) : 0;
            $id2 = (!empty($_GET['npat']))? intval($_GET['npat']) : 0;
            $id3 = (!empty($_GET['acte']))? intval($_GET['acte']) : 0;

			$connect->exec("DELETE FROM acte WHERE NumMed = $id and NumPat = $id2 and DateActe = $id3");
			header('insertion2.php');?> 
        
			
			<p>L'entrée  <?php echo $_GET['nmed']; ?>   a été supprimée. </p>	
		<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>

			<?php break ;	
			
			
			
			case "Hospitalisation" :
            $id = (!empty($_GET['npat']))? intval($_GET['npat']) : 0;
            $id2 = (!empty($_GET['de']))? intval($_GET['de']) : 0;
            $id3 = (!empty($_GET['ns']))? intval($_GET['ns']) : 0;

			$connect->exec("DELETE FROM hospitalisation WHERE NumPat = $id and DateEntree = $id2 and NumSalle=$id3");
			header('insertion2.php');?>
			
			<p>L'entrée  <?php echo $_GET['id']; ?>   a été supprimée. </p>	
		<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>

			<?php break ;

			case "Infirmier" :
				$id = (!empty($_GET['ninf']))? intval($_GET['ninf']) : 0;


				$connect->exec("DELETE FROM infirmier WHERE NumInf = $id");
				header('insertion2.php');?>
				
				<p>L'entrée  <?php echo $_GET['id']; ?>   a été supprimée. </p>	
			<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>

				<?php break ;	
				

			case "Medecin" :
				$id = (!empty($_GET['nmed']))? intval($_GET['nmed']) : 0;

				$connect->exec("DELETE FROM medecin WHERE NumMed = $id");
				header('insertion2.php');?>
				
				<p>L'entrée  <?php echo $_GET['id']; ?>   a été supprimée. </p>	
			<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>

				<?php break ;	
			
			case "Patient" :
				$id = (!empty($_GET['npat']))? intval($_GET['npat']) : 0;

				$connect->exec("DELETE FROM patient WHERE NumPat = $id");
				header('insertion2.php');?>
				
				<p>L'entrée  <?php echo $_GET['id']; ?>   a été supprimée. </p>	
			<p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>

            <?php break ;	

            case "Salle" :
                $id = (!empty($_GET['nsal']))? intval($_GET['nsal']) : 0;
                $id2 = (!empty($_GET['nserv']))? intval($_GET['nserv']) : 0;
            

                $connect->exec("DELETE FROM salle WHERE NumSalle = $id and NumService = $id2 ");
                header('insertion2.php');?>
                
                <p>L'entrée  <?php echo $_GET['id']; ?>   a été supprimée. </p>	
            <p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>

                <?php break ;

            case "Service" :
                $id = (!empty($_GET['nserv']))? intval($_GET['nserv']) : 0;

                $connect->exec("DELETE FROM service WHERE NumServ = $id ");
                header('insertion2.php');?>
                
                <p>L'entrée  <?php echo $_GET['id']; ?>   a été supprimée. </p>	
            <p> <a href="index.php">Cliquez ici</a> pour revenir à la page d'accueil.</p>

                <?php break ;


            
        }

    }
    catch (Exception $e)
    {
//en cas d'erreur on affiche un message et on arrete tout
        die('Erreur : ' . $e->getMessage());
		
    }