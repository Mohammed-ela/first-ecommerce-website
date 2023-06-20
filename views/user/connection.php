<?php  
$title = "S'identifier";
include VIEWS.'inc/header.php'; 

?>


      <h1 class="title-h1-sidentifier">S'identifier</h1>

	    <form method="post" action="login" >
            <?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 
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
  </form>









<?php  
if (!empty($_SESSION['user'])) {
  var_dump($_SESSION['user']);
}

include VIEWS.'inc/footer.php'; 

?>