<?php  
$title = "Categorie";
include VIEWS.'inc/header.php'; 
if (!App::isconnect()) {
	header("Location:" . BASE_PATH . "");
}

if (!App::isadmin()) {
	header("Location:" . BASE_PATH . "");
}
?>


			<h1 class="text-center my-5">Vous êtes au bon endroit pour vous enregistrez une categorie!</h1>
	<?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 

			$_SESSION["message"] = "";
	?>
	<form method="post" action="" class="w-50 mx-auto">
	
	<div class="row g-3">
		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="nom" placeholder="Nom" name="name">
			<label for="nom">Nom</label>
		</div>

		<div class="form-floating col-md-6 mb-3">
			<input type="text" class="form-control" id="prenom" placeholder="Prenom" name="picture">
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

	<input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">

</form>

<?php  include VIEWS.'inc/footer.php'; ?>