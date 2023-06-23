<?php  
$title = "Inscription";
include VIEWS.'inc/header.php'; 
?>

      <h1 class="title-h1-sidentifier">S'enregistrer</h1>


<section class="formulaire-inscription">
		
	<form class="form-senregistrer" method="post" action="" enctype="multipart/form-data">
	
		<div class="nom-prenom">
			<div class="lenom">
				<input type="text" class="input-senregistrer" id="nom" placeholder="Votre nom" name="nom">
				<label for="nom"></label>
			</div>

			<div class="leprenom">
				<input type="text" class="input-senregistrer" id="prenom" placeholder="Votre prénom" name="prenom">
				<label for="prenom"></label>
			</div>
		</div>

		<div class="autre-info">
				
			<div class="f">
				<label for="Pseudonyme"></label>
				<input type="text" class="input-senregistrer-long" id="user" placeholder="Votre pseudo" name="pseudo">
			</div>

			<div class="em@il">
				<label for="Email"></label>
				<input type="email" class="input-senregistrer-long" id="email" placeholder="Votre email" name="email">
			</div>

			<div class="pass-word">
				<label for="floatingPassword"></label>
				<input type="password" class="input-senregistrer-long" id="password" placeholder="Votre mots de passe" name="mdp">
			</div>

			<div class="adrs">
				<label for="Adresse"></label>
				<input type="tel" class="input-senregistrer-long" id="number" placeholder="Votre adresse postale" name="adresse">
			</div>

			<div class="no">
				<label for="Number"></label>
				<input type="tel" class="input-senregistrer-long" id="number" placeholder="Votre numéro de téléphone" name="numero">
			</div>

			<div class="pp">
				<input class="form-control" name="pp" type="file" id="photo">
				<label for="formFile" class="form-label"></label>
			</div>

			<div class="list-btn">
				<input type="submit" class="btn-first" value="S'enregistrer" name="submit">
				<a href="connection" class="link-register">Déjà inscrit ?</a>
			</div>
			
		</div>
	</form>
</section>

<?php include VIEWS.'inc/footer.php'; ?>