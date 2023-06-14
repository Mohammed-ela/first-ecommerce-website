<?php
$connected=App::isconnect(); // j'enregistre ma fonction isconnect() dans une variable

$admin=null;

if ($connected=='false') { // si je suis connecté
$admin=App::isadmin();	 // j'enregistre ma fonction isadmin() dans une variable
}
$quantity='0';
if (isset($_SESSION['panier'])) {
$panier = $_SESSION['panier'];
$quantity = App::calculerTotalPanier($panier);
}

?>
<!DOCTYPE html>
<html lang="fr-FR">
  <head>
    <meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?=$title?></title>
	<meta name="keyword" content="Projet E-commerce, Projet fin d'année, montre connecte, smartwatch, Marketplace, E-commerce, BDD. ">
    <meta name="description" content="Synkro est un site E-commerce proposant une panoplie de montre dedstinés au sportif à vendre ! ">
	<!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
	<!-- Tailwin -->
	<!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <link rel="stylesheet" href="<?= ASSETS. "css/reset.css"?>">
    <link rel="stylesheet" href="<?= ASSETS. "css/styles.css"?>">
	<!-- iconify -->
	<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
	<!-- Javascript -->
	<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
	<script src="<?= ASSETS. "js/main.js"?>" defer></script>

  </head>
<header>

<nav class="navbar">

			<!-- 1ER BOITE -->
		  <div class="logo">
			<img src="<?= TELECHARGEMENT. "user/default-pp.png"?>" id="logo" alt="logo-synkro" >
		  </div>

			<!-- 2EME BOITE -->
		<ul id="flex-mid">
			<!-- -->
	        <li class="item-nav">
	          <a class="link-nav" aria-current="page" href="&emsp;">Accueil</a>
	        </li>
			<li class="item-nav">
	          <a class="link-nav" href="Categorie">Catégories</a><iconify-icon icon="ep:arrow-down" width="24" height="24"></iconify-icon>
	        </li>
			<li class="item-nav">
	          <a class="link-nav" href="Categorie">Produits</a><iconify-icon icon="ep:arrow-down" width="24" height="24"></iconify-icon>
			  <!-- ajout produit avec différent id -->
	        </li>				
		</ul>
			

				<!-- Acces au crud uniquement au ADMIN -->
			<?php
			if ($admin=='false') {
			?>
	        <li>
	          <a href="administration">ADMIN_Administration</a>
	        </li>
	        <li>
	          <a href="categorie">ADMIN_Categorie</a>
	        </li>
	        <li>
	          <a href="produit">ADMIN_Produit</a>
	        </li>
			<?php	
			}
			?>

			<!-- 3ER BOITE ON EST CONNECTE -->
			<!-- bouton deconnexion qui saffiche quand on est connecte -->
			<?php
			if ($connected=='false') {
			?>
									<!-- gestion du profil  -->

<div class="outils">

		<ul id="panier">
			<li class="item-nav">
			<a href="list_panier">
			<iconify-icon icon="iconoir:cart" style="color: white;" width="24" height="24"></iconify-icon>
			<span id="panier-badge"><?= $quantity?></span>
			</a>
			</li>

		</ul>
	

		<ul id="user">

			<li class="item-nav">
<a class="link-nav" href="mon-profil?id=<?=$_SESSION['user']['id_user'] ?>"><img src="<?= TELECHARGEMENT. "user/". $_SESSION['user']['pp'] ?>" class="rounded-circle img-fluid" id="picture-profil" alt="profil-picture" ></a>
			</li>	

			<li class="item-nav">
				<a class="link-nav" href="mon-profil?id=<?=$_SESSION['user']['id_user'] ?>">
					<span> <?=!empty($_SESSION['user']['pseudo']) ? $_SESSION['user']['pseudo'] : "";?> </span> 
				</a>
	        </li>		
			<li class="item-nav">  
	          <a class="link-nav" href="deconnexion">Se deconnecter</a> 
	        </li>	
		</ul>
</div>

			<?php	
			}
			?>

			<!-- 3ER BOITE bis-->

			<!-- incription / connection -->

			<?php
			if (!$connected=='false') {
			?>
			<ul id="guest">
				<li class="item-nav">
				<iconify-icon icon="ph:user" width="24" height="24"></iconify-icon><a class="link-nav" href="connection">Se connecter</a>
				</li>
				<li class="item-nav">
					<a class="link-nav" href="inscription">S'enregistrer</a> 
				</li>
			</ul>
			<?php	
			}
			?>


	</nav>
	</header>
<?php
//session message
	if (!empty($_SESSION["message"])) {
        echo($_SESSION["message"]);
        unset($_SESSION["message"]);
    }
	?>