<?php  
$title = "Modification";
include VIEWS.'inc/header.php'; 
$userFromBdd=user::modifier();
// app::showArray($userFromBdd);
?>


			<h1 class="text-center my-5">Modification utilisateur</h1>
	<?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 

			$_SESSION["message"] = "";
	?>
	<form method="post" action="enregistrement?id=<?=$userFromBdd["id_user"]?>" class="w-50 mx-auto">
	
	<div class="row g-3">
		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="nom" placeholder="Nom" name="nom" value="<?=!empty($userFromBdd['nom']) ? $userFromBdd['nom'] : "";?>">
			<label for="nom">Nom</label>
		</div>

		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="Prenom" name="prenom" value="<?=!empty($userFromBdd['prenom']) ? $userFromBdd['prenom'] : "";?>">
			 <label for="prenom">Prénom</label>
		</div>
	</div>

	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="user" placeholder="Pseudo" name="pseudo" value="<?=!empty($userFromBdd['pseudo']) ? $userFromBdd['pseudo'] : "";?>">
		<label for="user">Pseudo</label>
	</div>

	<div class="form-floating mb-3">
		<input type="email" class="form-control" id="email" placeholder="email" name="email" value="<?=!empty($userFromBdd['email']) ? $userFromBdd['email'] : "";?>">
		<label for="user">Email</label>
	</div>

	<div class="form-floating mb-3">
		<input type="password" class="form-control" id="password" placeholder="votre mdp" name="mdp" value="<?=!empty($userFromBdd['password']) ? $userFromBdd['password'] : "";?>">
		<label for="floatingPassword">Mot de Passe</label>
	</div>

	<div class="form-floating mb-3">
		<input type="text" class="form-control" id="number" placeholder="adresse" name="adresse" value="<?=!empty($userFromBdd['adresse']) ? $userFromBdd['adresse'] : "";?>">
		<label for="adresse">Adresse</label>
	</div>

	<div class="form-floating mb-3">
		<input type="tel" class="form-control" id="number" placeholder="numero de telephone" name="numero" value="<?=!empty($userFromBdd['numero']) ? $userFromBdd['numero'] : "";?>">
		<label for="numero">Numéro de téléphone</label>
	</div>

    <div class="form-floating mb-3">
		<input type="text" class="form-control" id="number" placeholder="le statut" name="statut" value="<?=!empty($userFromBdd['statut']) ? $userFromBdd['statut'] : "";?>">
		<label for="statut">statut</label>
	</div>

	<input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">
</form>

<?php  

include VIEWS.'inc/footer.php'; 
?>