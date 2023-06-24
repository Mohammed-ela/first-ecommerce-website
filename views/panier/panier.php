<?php  
$title = "Synkro";
include VIEWS.'inc/header.php'; 
$allmontre = Panier::show_panier();
// var_dump($allmontre);
$panier = $_SESSION['panier'];

        // Variables pour le total
        $quantiteTotal = 0;
        $prixTotal = 0;
?>

<body>
    <main>
        <section class="list-panier">
            <!-- tableau 1 -->
            <table class="first-tab">
                <thead class="">
                    <tr class="flex-tr">
                        <th scope="col">Produit</th>
                        <th  style="text-align: center;" scope="col">Image</th>
                        <th scope="col">Quantité</th>
                        <th scope="col">Prix</th>
                        <th scope="col" style="text-align:end;"> 
                            <form method="POST" action="viderpanier">
                                <input type="hidden"><button type="submit" class="btn-supprimer">Vider Panier</button>
                        </form></th>
                    </tr>
                </thead>
                <tbody class="">
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
                        <tr class="article-panier">
                            <td><a href="Produit_info?id=<?=$montre['id_montre']?>"><?= $titre ?></a></td>
                            <td style="text-align: center;"><a href="Produit_info?id=<?=$montre['id_montre']?>"><img src="<?= TELECHARGEMENT. "produit/". $image ?>" id="<?=$titre?>"></a></td>
                            <td style="text-align: center;"><?= $quantite ?></td>
                            <td><?= $prix." €"?></td>
                            <td style="text-align: end;">
                                <a href="supprimer_panier?id=<?= $produitId ?>" class="btn-supprimer" >Supprimer</a>
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


            <!-- tableau 2 -->
            <table class="second-tab">
                <thead class="">
                    <tr class="flex-tr">
                        <th style="vertical-align: middle;text-align: center;" scope="col">Resumé</th>
                        
                    </tr>
                </thead>
                <tbody class="">
                    <tr class="article-panier">
                        <th style="vertical-align: middle;">Quantité :</th>
                    <td style="text-align: center;"><?= $quantiteTotal ?></td>
                    </tr>  
                    <tr class="article-panier">
                    <th style="vertical-align: middle;">Prix total :</th>
                    <td style="text-align: center;"><?= $prixTotal ?> €</td>
                    </tr> 

                </tbody>
                <td>

                        
                    
    <form method="POST" action="paiement">
      <input type="hidden" name="prx" value="<?= $prixTotal ?>">
      <button type="submit" class="btn-payez">Payer</button>
    </form>
</td>

                
            </table>
        </section>
        
    </main>
</body>

<?php include VIEWS.'inc/footer.php'; ?>
