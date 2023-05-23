<?php  
$title = "Inscription";
include VIEWS.'inc/header.php'; 
?>


			<h1 class="text-center my-5">Vous êtes au bon endroit pour vous enregistrez !</h1>
	<?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 

			$_SESSION["message"] = "";
	?>
	<form class="w-50 mx-auto" method="post" action="" enctype="multipart/form-data">
	
	<div class="row g-3">
		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
			<label for="nom">Nom</label>
		</div>

		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="Prenom" name="prenom">
			 <label for="prenom">Prénom</label>
		</div>

		<div class="form-group mb-2">
            <label for="profil-picture" class="form-label">Ajouter une photo de profil : </label>
			<input type="file" name="pp" id="photo">
        </div>
	</div>

	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="user" placeholder="Pseudo" name="pseudo">
		<label for="Pseudonyme">Pseudo</label>
	</div>

	<div class="form-floating mb-3">
		<input type="email" class="form-control" id="email" placeholder="email" name="email">
		<label for="Email">Email</label>
	</div>

	<div class="form-floating mb-3">
		<input type="password" class="form-control" id="password" placeholder="votre mdp" name="mdp">
		<label for="floatingPassword">Mot de Passe</label>
	</div>

	<div class="form-floating mb-3">
		<input type="tel" class="form-control" id="number" placeholder="telephone" name="adresse">
		<label for="Adresse">Adresse</label>
	</div>

	<div class="form-floating mb-3">
		<input type="tel" class="form-control" id="number" placeholder="telephone" name="numero">
		<label for="Number">Numéro de téléphone</label>
	</div>

	<input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">
	<a href="connection" class="link-secondary">Se connecter</a>
</form>

<?php include VIEWS.'inc/footer.php'; ?>