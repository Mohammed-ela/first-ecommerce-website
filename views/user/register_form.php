<?php  include VIEWS.'inc/header.php'; ?>


			<h1 class="text-center my-5">Vous êtes au bon endroit pour vous enregistrez !</h1>
	<?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 
	
			$_SESSION["message"] = "";
	?>
	<form method="post" action="" class="w-50 mx-auto">
	
	<div class="row g-3">
		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="nom" placeholder="Nom" name="nom">
			<label for="nom">Nom</label>
		</div>

		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="Prenom" name="prenom">
			 <label for="prenom">Prénom</label>
		</div>
	</div>

	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="user" placeholder="Pseudo" name="pseudo">
		<label for="user">Pseudo</label>
	</div>

	<div class="form-floating mb-3">
		<input type="email" class="form-control" id="email" placeholder="email" name="mail">
		<label for="user">Email</label>
	</div>

	<div class="form-floating mb-3">
		<input type="password" class="form-control" id="password" placeholder="votre mdp" name="mdp">
		<label for="floatingPassword">Mot de Passe</label>
	</div>

	<div class="form-floating mb-3">
		<input type="tel" class="form-control" id="number" placeholder="telephone" name="numero">
		<label for="floatingPassword">Numéro de téléphone</label>
	</div>

	<input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">
</form>

<?php  include VIEWS.'inc/footer.php'; ?>