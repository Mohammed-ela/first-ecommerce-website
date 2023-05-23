<?php  
$title = "Modification";
include VIEWS.'inc/header.php'; 
$userFromBdd=Produit::modifier();
// app::showArray($userFromBdd);
?>


			<h1 class="text-center my-5">Modification Produit</h1>
	<?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 

			$_SESSION["message"] = "";
	?>
	<form method="post" action="enregistrement_prd?id=<?=$userFromBdd["id_montre"]?>" class="w-50 mx-auto">
	
	<div class="row g-3">
		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="nom" placeholder="titre" name="titre" value="<?=!empty($userFromBdd['titre']) ? $userFromBdd['titre'] : "";?>">
			<label for="nom">Titre</label>
		</div>

		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="photo" name="photo" value="<?=!empty($userFromBdd['photo']) ? $userFromBdd['photo'] : "";?>">
			 <label for="prenom">Picture</label>
		</div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Ajouter une image</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
	</div>

    <div class="form-group">
        <label for="exampleFormControlTextarea1">Description</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
    </div>
    <div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="photo" name="couleur" value="<?=!empty($userFromBdd['couleur']) ? $userFromBdd['couleur'] : "";?>">
			 <label for="prenom">Couleur</label>
		</div>
    
        <div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="photo" name="autonomie"value="<?=!empty($userFromBdd['autonomie']) ? $userFromBdd['autonomie'] : "";?>">
			 <label for="prenom">Autonomie</label>
		</div>

        <div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="photo" name="avis"value="<?=!empty($userFromBdd['avis']) ? $userFromBdd['avis'] : "";?>">
			 <label for="prenom">Avis</label>
		</div>

        <div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="photo" name="prix" value="<?=!empty($userFromBdd['prix']) ? $userFromBdd['prix'] : "";?>">
			 <label for="prenom">Prix</label>
		</div>
	<input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">

</form>

<?php  

include VIEWS.'inc/footer.php'; 
?>