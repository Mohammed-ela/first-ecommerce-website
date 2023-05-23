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


			<h1 class="text-center my-5">Vous êtes au bon endroit pour gerez vos Categorie !</h1>
                  <?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 

			$_SESSION["message"] = "";
	?>
                  <table class="table table-striped container-sm">

<thead>
      <tr>

            <th scope="col">id_categorie</th>
            <th scope="col">Nom</th>
            <th scope="col">Description</th>
            <th scope="col">Picture</th>
            <td><a href="ajouter_cat" class="btn btn-primary">Ajouter</a></td>
      </tr>
</thead>
<tbody class="table-striped">
<?php       

            $allUsers=Categorie::showDb();
            foreach ($allUsers as $user)
             {
                 
                ?>

                <tr>
                        <td><?=$user["id_categorie"]?></td>
                        <td><?=$user["name"]?></td>
                        <td><?=$user["description"]?></td>
                        <td><?=$user["picture"]?></td>
                    <td> 

                  <a href="supprimer_cat?id=<?=$user["id_categorie"]?>" class="btn btn-danger">Supprimer</a>   

                  </td>
                  <td> 

                  <a href="modifier_cat?id=<?=$user["id_categorie"]?>" class="btn btn-primary">Modifier</a>   

                  </td>
                 
                </tr>
                <?php
             }
            ?>
    </tbody>
</table>



<?php  include VIEWS.'inc/footer.php';?>