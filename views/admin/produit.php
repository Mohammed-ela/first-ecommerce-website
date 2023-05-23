<?php  
$title = "Produit";
include VIEWS.'inc/header.php';

if (!App::isconnect()) {
      header("Location:" . BASE_PATH . "");
}

if (!App::isadmin()) {
      header("Location:" . BASE_PATH . "");
}

?>


			<h1 class="text-center my-5">Vous êtes au bon endroit pour gerez vos Montre en fonction des catégories !</h1>
                  <?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 

			$_SESSION["message"] = "";
	?>
                  <table class="table table-striped container-sm">

<thead>
      <tr>

            <th scope="col">id_produit</th>
            <th scope="col">Titre</th>
            <th scope="col">Description</th>
            <th scope="col">Couleur</th>
            <th scope="col">Autonomie</th>
            <th scope="col">Picture</th>
            <th scope="col">Avis</th>
            <th scope="col">Prix</th>
            <th scope="col">date de creation</th>
            <th scope="col">categorie_id (etrangere)</th>
            <td><a href="ajouter_prd" class="btn btn-primary">Ajouter</a></td>
      </tr>
</thead>
<tbody class="table-striped">
<?php       

            $allUsers=Produit::showDb();
            foreach ($allUsers as $user)
             {
                 
                ?>

                <tr>
                        <td><?=$user["id_montre"]?></td>
                        <td><?=$user["titre"]?></td>
                        <td><?=$user["description"]?></td>
                        <td><?=$user["couleur"]?></td>
                        <td><?=$user["autonomie"]?></td>
                        <td><?=$user["photo"]?></td>
                        <td><?=$user["avis"]?></td>
                        <td><?=$user["prix"]?></td>
                        <td><?=$user["date_creation"]?></td>
                        <td><?=$user["categorie_id"]?></td>

                    <td> 

                  <a href="supprimer_prd?id=<?=$user["id_montre"]?>" class="btn btn-danger">Supprimer</a>   

                  </td>
                  <td> 

                  <a href="modifier_prd?id=<?=$user["id_montre"]?>" class="btn btn-primary">Modifier</a>   

                  </td>
                 
                </tr>
                <?php
             }
            ?>
    </tbody>
</table>



<?php  include VIEWS.'inc/footer.php';?>