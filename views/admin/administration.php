<?php  
$title = "Administration";
include VIEWS.'inc/header.php';
$requete = User::showDb("SELECT * FROM `user` ")

?>


			<h1 class="text-center my-5">Vous êtes au bon endroit pour gerez vos utilisateur inscrit !</h1>
                  <?= isset($_SESSION["message"]) ? $_SESSION["message"] : ""; 

			$_SESSION["message"] = "";
	?>
                  <table class="table table-striped container">

<thead>
      <tr>

            <th scope="col">id_user</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Pseudo</th>
            <th scope="col">mots de passe</th>
            <th scope="col">adresse</th>
            <th scope="col">Numero telephone</th>
            <th scope="col">Email</th>
            <th scope="col">date de creation</th>
            <th scope="col">statut</th>

      </tr>
</thead>
<tbody class="table-striped">
<?php       

             
             foreach ($requete as $user)
             {
                 
                ?>

                <tr>
                    <td><?=$user["id_user"]?></td>
                    <td><?=$user["nom"]?></td>
                    <td><?=$user["prenom"]?></td>
                    <td><?=$user["pseudo"]?></td>
                    <td><?=$user["password"]?></td>
                    <td><?=$user["adresse"]?></td>
                    <td><?=$user["numero"]?></td>
                    <td><?=$user["mail"]?></td>
                    <td><?=$user["date_de_creation"]?></td>
                    <td><?=$user["statut"]?></td>
                  <td> 

                        <a href="<?=URL?>supprimer.php?id=<?=$user["id_user"]?>" class="btn btn-danger">Supprimer</a>

                  </td>
                  <td> 

                        <a href="<?=URL?>modifier.php?id=<?=$user["id_user"]?>" class="btn btn-primary">Modifier</a>

                  </td>

                </tr>
                <?php
             }
            ?>
    </tbody>
</table>

<?php  include VIEWS.'inc/footer.php'; ?>