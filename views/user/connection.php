<?php  
$title = "S'identifier";
include VIEWS.'inc/header.php'; 

?>


      <h1 class="title-h1-sidentifier">S'identifier</h1>
<section class="formulaire-de-connection">

	    <form method="post" action="login" class="form-sidentifier" >
            <?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 
?>
            <div class="email">
              <label for="@"></label>
              <input type="email"  class="input-sidentifier" name="monemail" value="<?=!empty($_SESSION['email']) ? $_SESSION['email'] : "";?>" placeholder="Votre Adresse email">
            </div>

            <div class="mdp">
			        <label for="mdp"></label>
              <input type="password" class="input-sidentifier" name="monmdp" value="<?=!empty($_SESSION['password']) ? $_SESSION['password'] : "";?>" placeholder="Votre mots de passe" />
            </div>

            <div class="submit-connect">

            <input type="submit" class="btn-sidentifier" value="Se connecter" name="submit">
            <input type="button" class="btn-sidentifier" value="S'enregistrer" onclick="window.location.href='inscription';">

            </div>
            
  </form>
  
</section>








<?php  
if (!empty($_SESSION['user'])) {
  var_dump($_SESSION['user']);
}

include VIEWS.'inc/footer.php'; 

?>