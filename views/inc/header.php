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
    <link rel="stylesheet" href="<?= ASSETS. "css/reset.css"?>">
    <link rel="stylesheet" href="<?= ASSETS. "css/styles.css"?>">
  </head>
<header>

<nav class="navbar">

			<!-- 1ER BOITE -->
		  <div class="logo">
			<img src="<?= TELECHARGEMENT. "user/default-pp.png"?>" id="logo" alt="logo-synkro" >
		  </div>

			<!-- 2EME BOITE -->
		<div class="flex-mid">
			<!-- -->
	        <li class="item-nav">
	          <a class="link-nav" aria-current="page" href="&emsp;">Accueil</a>
	        </li>
			<li class="item-nav">
	          <a class="link-nav" href="Categorie">Catégories</a>
	        </li>
			<li class="item-nav">
	          <a class="link-nav" href="Categorie">Produits</a>
			  <!-- ajout produit avec différent id -->
	        </li>				
		</div>
			

				<!-- Acces au crud uniquement au ADMIN -->
			<?php
			if ($admin=='false') {
			?>
	        <li class="">
	          <a class="" href="administration">ADMIN_Administration</a>
	        </li>
	        <li class="">
	          <a class="" href="categorie">ADMIN_Categorie</a>
	        </li>
	        <li class="">
	          <a class="" href="produit">ADMIN_Produit</a>
	        </li>
			<?php	
			}
			?>

			<!-- 3ER BOITE -->
			<!-- bouton deconnexion qui saffiche quand on est connecte -->
			<?php
			if ($connected=='false') {
			?>
			<div class="user">
			<li class="item-nav">  
	          <a class="link-nav" href="deconnexion">Se deconnecter</a> 
	        </li>
						<!-- gestion du profil  -->
			<ul class="gestion-profil">
			<li class="item-nav">
	          <a class="link-nav" href="mon-profil?id=<?=$_SESSION['user']['id_user'] ?>">
				<img src="<?= TELECHARGEMENT. "user/". $_SESSION['user']['pp'] ?>" class="rounded-circle img-fluid" id="picture-profil" alt="profil-picture" >
				
				<span> <?=!empty($_SESSION['user']['pseudo']) ? $_SESSION['user']['pseudo'] : "";?> </span> 
			  </a>
	        </li>	
			</ul>				
			</div>
			<?php	
			}
			?>

			<!-- 3ER BOITE bis-->

			<!-- incription / connection -->
			<div class="guest">
			<?php
			if (!$connected=='false') {
			?>
	        <li class="item-nav">
	          <a class="link-nav" href="inscription">Inscription</a> 
	        </li>
			<li class="item-nav">
	          <a class="link-nav" href="connection">Connection</a>
	        </li>
			</div>
			<?php	
			}
			?>


	</nav>
	</header>