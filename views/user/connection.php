<?php  
$title = "Connection";
include VIEWS.'inc/header.php'; 

?>

<!-- <h1 class="text-center my-5">Vous êtes au bon endroit pour vous Connectez !</h1> -->
	
	<form method="post" action="login" >
	
	<section class="vh-100" style="background-color: #1c2e31;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Se connecter</h3>
            <?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 

            $_SESSION["message"] = "";
?>
            <div class="form-outline mb-4">
			<label class="form-label" for="typeEmailX-2">Email</label>
              <input type="email" id="typeEmailX-2" class="form-control form-control-lg" name="monemail" value="<?=!empty($_SESSION['email']) ? $_SESSION['email'] : "";?>">
              
            </div>

            <div class="form-outline mb-4">
			<label class="form-label" for="typePasswordX-2">mot de passe</label>
              <input type="password" id="typePasswordX-2" class="form-control form-control-lg" name="monmdp" />


            </div>
            <a href="inscription" class="btn btn-secondary mt-3">S'enregistrer</a>
			<input type="submit" class="btn btn-primary mt-3" value="Submit" name="submit">

        </div>
      </div>
    </div>
  </div>
</section>

	

	

</form>









<?php  
if (!empty($_SESSION['user'])) {
  var_dump($_SESSION['user']);
}

include VIEWS.'inc/footer.php'; 

?>