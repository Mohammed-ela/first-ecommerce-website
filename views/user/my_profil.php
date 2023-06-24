<?php  
$title = "Mon profil";
include VIEWS.'inc/header.php'; 
if (!App::isconnect()) {
header("Location:" . BASE_PATH . "");
}
if (!empty($_GET['id'])) {
$achats = User::commandes();
}else {
    header("Location:" . BASE_PATH . "");
}
$allmontre = Panier::show_panier();


?>

            
			<h1 class="title-h1-nopad">Bienvenue dans la gestion de votre profil <?= $_SESSION['user']['pseudo'] ?></h1>

			<h2 class="title-h2-nopad text-center mt-5 mb-5">Vous êtes parmis nous depuis le  <?= date("d-m-Y",strtotime($_SESSION['user']['date_de_creation'])) ?> </h2>

			<section class="formulaire-inscription">
<form method="post" action="my_profil_register?id=<?=$_SESSION['user']['id_user']?>" class="form-senregistrer">

		<div class="nom-prenom">
			<div class="lenom">
				<input type="text" class="input-senregistrer" id="nom" placeholder="Votre nom" name="nom" value="<?=!empty($_SESSION['user']['nom']) ? $_SESSION['user']['nom'] : "";?>">
				<label for="nom"></label>
			</div>

			<div class="leprenom">
				<input type="text" class="input-senregistrer" id="prenom" placeholder="Votre prénom" name="prenom" value="<?=!empty($_SESSION['user']['prenom']) ? $_SESSION['user']['prenom'] : "";?>">
				<label for="prenom"></label>
			</div>
		</div>

		<div class="autre-info">
				
			<div class="f">
				<label for="Pseudonyme"></label>
				<input type="text" class="input-senregistrer-long" id="user" placeholder="Votre pseudo" name="pseudo" value="<?=!empty($_SESSION['user']['pseudo']) ? $_SESSION['user']['pseudo'] : "";?>">
			</div>

			<div class="em@il">
				<label for="Email"></label>
				<input type="email" class="input-senregistrer-long" id="email" placeholder="Votre email" name="email" value="<?=!empty($_SESSION['user']['email']) ? $_SESSION['user']['email'] : "";?>">
			</div>

			<div class="adrs">
				<label for="Adresse"></label>
				<input type="tel" class="input-senregistrer-long" id="number" placeholder="Votre adresse postale" name="adresse" value="<?=!empty($_SESSION['user']['adresse']) ? $_SESSION['user']['adresse'] : "";?>">
			</div>

			<div class="no">
				<label for="Number"></label>
				<input type="tel" class="input-senregistrer-long" id="number" placeholder="Votre numéro de téléphone" name="numero" value="<?=!empty($_SESSION['user']['numero']) ? $_SESSION['user']['numero'] : "";?>">
			</div>

			<div class="pp">
				<input class="form-control" name="pp" type="file" id="photo">
				<label for="formFile" class="form-label"></label>
			</div>

			<div style="align-self: center;" class="list-btn">
				<input type="submit" class="btn-first" value="Modifier" name="submit">
			</div>
			
		</div>
	
		
</form>
</section>
<?php 
// app::showArray($achats);
if (empty($_SESSION['user']['pp'])) {
	$_SESSION['user']['pp'] = 'default-pp.png';
}
include VIEWS.'inc/footer.php'; 
?>