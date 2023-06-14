<?php  
$title = "Produit";
include VIEWS.'inc/header.php';
$Product_selected=Produit::Produit_info();
$i='0';
            //     if ($_GET['id']=='2') {
            //         $h1='Montre Connecté';
            //     }elseif ($_GET['id']=='6') {
            //         $h1='Montre de Sport';
            //     }elseif ($_GET['id']=='7') {
            //         $h1='Montre de Luxe';
            //     }else {
            // $_SESSION["message"] .= "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
			// 	  ERREUR 404 page produit.php dossier produit
			// </div>";
			// header("Location:" . BASE_PATH . " ");
			// exit;
            //     } 

        // var_dump($Product_selected);
?>
<body>
<main>  
                    <h1 class="text-center p-5"><?= $Product_selected[$i]['titre'] ?></h1> 


                    <div class="">
                        <img src="<?= TELECHARGEMENT. "produit/". $Product_selected[$i]['photo'] ?>" class= "img-fluid" alt="<?= $Product_selected[$i]["titre"] ?>">
                        <p><?= $Product_selected[$i]["description"]?></p>
                        <p class="text-center">Couleur : <?= $Product_selected[$i]["couleur"]?></p>
                        <p class="text-center">Autonomie : <?= $Product_selected[$i]["autonomie"]?></p>
                        <p class="text-center">Prix : <?=$Product_selected[$i]["prix"]." €"?></p>
                        <button class="" onclick="window.location.href='panier?id=<?=$tabprod[$x]['id_montre']?>&cat=<?=$tabprod[$x]['categorie_id']?>';">
                          <iconify-icon class="icon-cart" icon="iconoir:cart" width="24" height="24"></iconify-icon>
                        </button>
                    </div>

</main>
</body>
<?php  include VIEWS.'inc/footer.php'; ?>