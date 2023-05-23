<?php  
$title = "Produit";
include VIEWS.'inc/header.php'; 
?>


			<h1 class="text-center my-5">Vous êtes au bon endroit pour vous enregistrez une montre !</h1>
	<?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 

			$_SESSION["message"] = "";
	?>
	<form method="post" action="" class="w-50 mx-auto">
	
	<div class="row g-3">
		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="nom" placeholder="titre" name="titre">
			<label for="nom">Titre</label>
		</div>

		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="photo" name="photo">
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

	<?php 

	$allCategorie=Categorie::showDb();
	?>

        <select class="form-select" aria-label="Default select example" name="categorie">
            <option value="">----Veuillez choisir votre categorie----</option>
            <?php foreach ($allCategorie as $value) { ?>
                <option value='<?= $value["id_categorie"] ?>'><?= $value["name"] ?></option>
            <?php } ?>
        </select>

    <div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="photo" name="couleur">
			 <label for="prenom">Couleur</label>
		</div>
    
        <div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="photo" name="autonomie">
			 <label for="prenom">Autonomie</label>
		</div>

        <div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="photo" name="avis">
			 <label for="prenom">Avis</label>
		</div>

        <div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="photo" name="prix">
			 <label for="prenom">Prix</label>
		</div>
	<input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">

</form>

<?php  include VIEWS.'inc/footer.php'; ?>