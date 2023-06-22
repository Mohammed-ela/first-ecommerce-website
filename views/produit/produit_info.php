<?php  
$title = "Produit";
include VIEWS.'inc/header.php';
$Product_selected=Produit::Produit_info();
$i='0';
        // Récupération des données nécessaires
	 $breadcrumb = App::getBreadcrumbData($_SERVER['REQUEST_URI']);
	 // Début du fil d'Ariane
	 echo '<ul class="breadcrumb">';

	 // Parcours des éléments du fil d'Ariane
	 foreach ($breadcrumb as $title => $url) {
		 // Lien actif (dernier élément du fil d'Ariane)
		 if ($url == '#') {
			 echo '<li class="active">' .$Product_selected[$i]['titre']. '</li>';
		 }
		 // Liens normaux
		 else {
			 echo '<li><a href="' . $url . '">' . $title . '</a></li>';
		 }
	 }

	 // Fin du fil d'Ariane
	 echo '</ul>';
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
                        <button class="" onclick="window.location.href='<?=BASE_PATH.'panier?id='.$Product_selected[$i]['id_montre']?>&cat=<?=$Product_selected[$i]['categorie_id']?>&p=prd_info';">
                          <iconify-icon class="icon-cart" icon="iconoir:cart" width="24" height="24"></iconify-icon>
                        </button>
                    </div>

</main>
</body>
<?php 

include VIEWS.'inc/footer.php'; ?>