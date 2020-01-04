<ul id="menu-demo2">
<h1>Pour changer de table, choisissez en une nouvelle </h1>
	
	<li><a href="#">Choisissez votre table </a>
		<ul>
			<li><a href="patient.php">Patient</a></li>
			<li><a href="service.php">Service</a></li>
			<li><a href="salle.php">Salle</a></li>
			<li><a href="infirmer.php">Infirmier</a></li>
			<li><a href="medecin.php">Medecin</a></li>
			<li><a href="hospitalisation.php">Hospitalisation</a></li>
			<li><a href="acte.php">Acte</a></li>
		</ul>
	</li>
</ul>
<h2>Pour remplir la table hospitalisation : </h2>
<form action = "remplissagemainhospitalisation.php" method="post">
NumeroPatient : <input type = "text" name = "NumPat"><br />
"DateEntree" : <input type = "text" name = "DateEntree"><br />
NumSalle : <input type = "text" name = "NumSalle"><br />
NumService : <input type = "text" name = "NumService"><br />
"DateSortie" : <input type = "text" name = "DateSortie"><br />
<input type = "submit" value = "Envoyer">
</form>
<h3> Avec un fichier csv </h3>
<form method="post" enctype="multipart/form-data" action="importhospitalisation.php">
<input name="userfile" type="file" value="table" />
<input name="submit" type="submit" value="Importer" />
</form>

<style>
#menu-demo2, #menu-demo2 ul{
padding:0;
margin:0;
list-style:none;
text-align:center;
}
#menu-demo2 li{
display:inline-block;
position:relative;
border-radius:8px 8px 0 0;
}
#menu-demo2 ul li{
display:inherit;
border-radius:0;
}
#menu-demo2 ul li:hover{
border-radius:0;
}
#menu-demo2 ul li:last-child{
border-radius:0 0 8px 8px;
}
#menu-demo2 ul{
position:absolute;
z-index: 1000;
max-height:0;
left: 0;
right: 0;
overflow:hidden;
-moz-transition: .8s all .3s;
-webkit-transition: .8s all .3s;
transition: .8s all .3s;
}
#menu-demo2 li:hover ul{
max-height:15em;
}
/* background des liens menus */
#menu-demo2 li:first-child{
background-color: #65537A;
background-image:-webkit-linear-gradient(top, #65537A 0%, #2A2333 100%);
background-image:linear-gradient(to bottom, #65537A 0%, #2A2333 100%);
}
#menu-demo2 li:nth-child(2){
background-color: #729EBF;
background-image: -webkit-linear-gradient(top, #729EBF 0%, #333A40 100%);
background-image:linear-gradient(to bottom, #729EBF 0%, #333A40 100%);
}
#menu-demo2 li:nth-child(3){
background-color: #F6AD1A;
background-image:-webkit-linear-gradient(top, #F6AD1A 0%, #9F391A 100%);
background-image:linear-gradient(to bottom, #F6AD1A 0%, #9F391A 100%);
}
#menu-demo2 li:last-child{
background-color: #CFFF6A;
background-image:-webkit-linear-gradient(top, #CFFF6A 0%, #677F35 100%);
background-image:linear-gradient(to bottom, #CFFF6A 0%, #677F35 100%);
}
/* background des liens sous menus */
#menu-demo2 li:first-child li{
background:#2A2333;
}
#menu-demo2 li:nth-child(2) li{
background:#333A40;
}
#menu-demo2 li:nth-child(3) li{
background:#9F391A;
}
#menu-demo2 li:last-child li{
background:#677F35;
}
/* background des liens menus et sous menus au survol */
#menu-demo2 li:first-child:hover, #menu-demo2 li:first-child li:hover{
background:#65537A;
}
#menu-demo2 li:nth-child(2):hover, #menu-demo2 li:nth-child(2) li:hover{
background:#729EBF;
}
#menu-demo2 li:nth-child(3):hover, #menu-demo2 li:nth-child(3) li:hover{
background:#F6AD1A;
}
#menu-demo2 li:last-child:hover, #menu-demo2 li:last-child li:hover{
background:#CFFF6A;
}
/* les a href */
#menu-demo2 a{
text-decoration:none;
display:block;
padding:8px 32px;
color:#fff;
font-family:arial;
}
#menu-demo2 ul a{
padding:8px 0;
}
#menu-demo2 li:hover li a{
color:#fff;
text-transform:inherit;
}
#menu-demo2 li:hover a, #menu-demo2 li li:hover a{
color:#000;
}
</style>