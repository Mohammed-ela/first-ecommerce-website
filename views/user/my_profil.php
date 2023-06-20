<?php  
$title = "Mon profil";
include VIEWS.'inc/header.php'; 
if (!App::isconnect()) {
header("Location:" . BASE_PATH . "");
}

$achats = User::commandes();
$allmontre = Panier::show_panier();


?>


			<h1 class="text-center my-5"> Bienvenue dans la gestion de votre profil <?= $_SESSION['user']['pseudo'] ?></h1>
            <h2 class="text-center mb-5 ">Vous êtes membre depuis le  <?= date("d-m-Y",strtotime($_SESSION['user']['date_de_creation'])) ?> </h2>



<form method="post" action="my_profil_register?id=<?=$_SESSION['user']['id_user']?>" class="w-50 mx-auto">
	
	<div class="row g-3">
		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" value="<?=!empty($_SESSION['user']['nom']) ? $_SESSION['user']['nom'] : "";?>">
			<label for="nom">Nom</label>
		</div>

		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="Prenom" name="prenom" value="<?=!empty($_SESSION['user']['prenom']) ? $_SESSION['user']['prenom'] : "";?>">
			 <label for="prenom">Prénom</label>
		</div>
		<div class="form-group mb-2">

		<label for="profil-picture" class="form-label">Modifier votre ancienne photo de profil :&nbsp;</label><span name=picture-profil><?=!empty($_SESSION['user']['pp']) ? $_SESSION['user']['pp'] : "";?></span><br>
		<input type="file" name="pp" id="photo" value="<?=!empty($_SESSION['user']['pp']) ? $_SESSION['user']['pp'] : "";?>" > 
			
        </div>
	</div>

	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="user" placeholder="Pseudo" name="pseudo" value="<?=!empty($_SESSION['user']['pseudo']) ? $_SESSION['user']['pseudo'] : "";?>">
		<label for="user">Pseudo</label>
	</div>

	<div class="form-floating mb-3">
		<input type="email" class="form-control" id="email" placeholder="email" name="email" value="<?=!empty($_SESSION['user']['email']) ? $_SESSION['user']['email'] : "";?>">
		<label for="user">Email</label>
	</div>

	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="number" placeholder="adresse" name="adresse" value="<?=!empty($_SESSION['user']['adresse']) ? $_SESSION['user']['adresse'] : "";?>">
		<label for="adresse">Adresse</label>
	</div>

	<div class="form-floating mb-3">
		<input type="tel" class="form-control" id="number" placeholder="numero de telephone" name="numero" value="<?=!empty($_SESSION['user']['numero']) ? $_SESSION['user']['numero'] : "";?>">
		<label for="numero">Numéro de téléphone</label>
	</div>

	<input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">
</form>


<section class="commandes">

<?php 
$divs = [];
$currentDate = null;
$currentHour = null;
foreach ($achats as $achat) {
    $date = date('Y-m-d', strtotime($achat['date_achat']));
    $heure = date('H:i:s', strtotime($achat['date_achat']));
    
    if ($date != $currentDate) {
        // Nouvelle date, créez une nouvelle div avec un titre
        $divs[] = "<h1 class='text-center fs-1'>Mes commandes</h1>\n";
        $divs[] = "<h2>Vos commandes passées le $date</h2>\n";
        $currentDate = $date;
        $currentHour = null; // Réinitialise l'heure pour la nouvelle date
    }

    if ($heure != $currentHour) {
        // Nouvelle heure, fermez la div précédente et créez un sous-titre avec l'heure
        if ($currentHour != null) {
            $divs[] = "</div>\n";
        }
        $divs[] = "<div class='commande no'>\n";
        $divs[] = "<div>\n\t<h3>Vos commandes passées à $heure</h3>\n</div>\n";
        $currentHour = $heure;
    }

    $divs[] = "<ul class='list-commande'>\n";

    foreach ($allmontre as $montre) {
        if ($montre['id_montre'] == $achat['montre_id']) {
            $titre = $montre['titre'];
            $couleur = $montre['couleur'];
            $image = $montre['photo'];
            $prix = $montre['prix'];
            break;
        }
    }

    $divs[] = "\t<li>Produit: $titre</li>\n";
    $divs[] = "\t<li>Quantité: {$achat['quantite']}</li>\n";
    $divs[] = "\t<li>Couleur: {$couleur}</li>\n";
    $divs[] = "\t<li>Prix: {$prix}</li>\n";

    $divs[] = "</ul>\n";
}

// Fermer la dernière div avec la classe "commande no"
if ($currentHour != null) {
    $divs[] = "</div>\n";
}

// Affichez les divs résultantes
foreach ($divs as $div) {
    echo $div;
}

?>

	
</section>
<?php 
// app::showArray($achats);
include VIEWS.'inc/footer.php'; 
?>