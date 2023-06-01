<?php
$connected=App::isconnect(); // j'enregistre ma fonction isconnect() dans une variable

$admin=null;

if ($connected=='false') { // si je suis connecté
$admin=App::isadmin();	 // j'enregistre ma fonction isadmin() dans une variable
}

?>
<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=$title?></title>
	<meta name="keyword" content="Projet E-commerce , Projet fin d'année , montre connecte , smartwatch , Marketplace ">
    <meta name="description" content="Synkro est un site E-commerce proposant une panoplie de montre à vendre ! ">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../reset.css">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark p-3 " style="background-color:#1C2331;" id="headerNav">
	  <div class="container-fluid">
	 
	    <div class=" collapse navbar-collapse" id="">
	      <ul class="navbar-nav mx-auto ">
	        <li class="nav-item">
	          <a class="nav-link mx-2" aria-current="page" href="&emsp;">Accueil</a>
	        </li>
			<!-- incription / connection -->

			<li class="nav-item">
	          <a class="nav-link mx-2" href="Categorie">Categorie</a>
	        </li>

			<!-- incription / connection -->
			<?php
			if (!$connected=='false') {
			?>
	        <li class="nav-item">
	          <a class="nav-link mx-2" href="inscription">Inscription</a> 
	        </li>
			<?php	
			}
			?>
			<?php
			if (!$connected=='false') {
			?>
			<li class="nav-item">
	          <a class="nav-link mx-2" href="connection">Connection</a>
	        </li>
			<?php	
			}
			?>
				<!-- Acces au crud uniquement au ADMIN -->
			<?php
			if ($admin=='false') {
			?>
	        <li class="nav-item">
	          <a class="nav-link mx-2" href="administration">ADMIN_Administration</a>
	        </li>
			<?php	
			}
			?>
			<?php
			if ($admin=='false') {
			?>
	        <li class="nav-item">
	          <a class="nav-link mx-2" href="categorie">ADMIN_Categorie</a>
	        </li>
			<?php	
			}
			?>
			<?php
			if ($admin=='false') {
			?>
	        <li class="nav-item">
	          <a class="nav-link mx-2" href="produit">ADMIN_Produit</a>
	        </li>
			<?php	
			}
			?>
			<!-- bouton deconnexion qui saffiche quand on est connecte -->
			<?php
			if ($connected=='false') {
			?>

			<li class="nav-item">  
	          <a class="nav-link mx-2" href="deconnexion">Se deconnecter</a> 
	        </li>

			<?php
			}
			?>

						<!-- gestion du profil  -->
			<?php
			if ($connected=='false') {
			?>
			<li class="nav-item card-body text-center">
	          <a class="nav-link mx-2" href="mon-profil?id=<?=$_SESSION['user']['id_user'] ?>"><img src="<?= TELECHARGEMENT. "user/". $_SESSION['user']['pp'] ?>" class="rounded-circle img-fluid" id="picture-profil" alt="profil-picture" ></a>
			  <a class="nav-link mx-2" href="user"> <?=!empty($_SESSION['user']['pseudo']) ? $_SESSION['user']['pseudo'] : "";?> </a> 
	        </li>	
			
			<?php	
			}
			?>

	    </div>
	  </div>
	</nav>