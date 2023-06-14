<?php  
$title = "Synkro";
include VIEWS.'inc/header.php'; 
$allmontre = Panier::show_panier();
// var_dump($allmontre);

?>

<body>
    <main>
        
        <h2>Résumé de votre panier</h2>
        <?php  
    if (!empty($_SESSION["message"])) {
        echo($_SESSION["message"]);
        unset($_SESSION["message"]);
    }
      
        $panier = $_SESSION['panier'];

        // Variables pour le total
        $quantiteTotal = 0;
        $prixTotal = 0;
        
// echo(count($panier));
        ?>

        <div class="table-responsive-md">
            <table class="table table-striped container-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Produit</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Description</th>
                        <th scope="col">Couleur</th>
                        <th scope="col">Autonomie</th>
                        <th scope="col">Image</th>
                        <th scope="col">Prix</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    <?php
                    foreach ($panier as $produitId => $quantite) {
                       
                        // Chercher les détails du produit correspondant à l'ID dans $allmontre
                        $titre = '';
                        $description = '';
                        $couleur = '';
                        $autonomie = '';
                        $image = '';
                        $prix = '';

                        foreach ($allmontre as $montre) {
                            if ($montre['id_montre'] == $produitId) {
                                $titre = $montre['titre'];
                                $description = $montre['description'];
                                $couleur = $montre['couleur'];
                                $autonomie = $montre['autonomie'];
                                $image = $montre['photo'];
                                $prix = $montre['prix'];
                                break;
                            }
                        }
                        ?>
                        <tr>
                            <td><?= $titre ?></td>
                            <td><?= $quantite ?></td>
                            <td><?= $description ?></td>
                            <td><?= $couleur ?></td>
                            <td><?= $autonomie ?></td>
                            <td><img src="<?= TELECHARGEMENT. "produit/". $image ?>" id="picture-admin"></td>
                            <td><?= $prix." €"?></td>
                            <td>

                                <a href="supprimer_panier?id=<?= $produitId ?>" class="btn btn-danger" >Supprimer</a>
                            </td>
                        </tr>
                        <?php
                        // Mise à jour du total
                        $quantiteTotal += $quantite;
                        $prixTotal += $prix * $quantite;

                    }
                    ?>
                </tbody>
            </table>
            <table class="table table-striped container-sm">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Quantité Total</th>
                        <th scope="col">Prix total</th>
                    </tr>
                </thead>
                <tbody class="table-striped">
                    <td><?= $quantiteTotal ?></td>
                    <td><?= $prixTotal ?> €</td>

                    <td><form method="POST" action="paiement">
  <input type="hidden" name="prx" value="<?= $prixTotal ?>">
  <button type="submit" class="btn btn-danger">Payer</button>
</form>
</td>
                          
                </tbody>
                
            </table>
        </div>
    </main>
</body>

<?php include VIEWS.'inc/footer.php'; ?>
