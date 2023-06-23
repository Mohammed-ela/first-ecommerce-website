<?php  
$title = "Produit";
include VIEWS.'inc/header.php';
$Product_selected=Produit::Produit_info();
$i='0';
$photo='no-image.png';
        // Récupération des données nécessaires
	 $breadcrumb = App::getBreadcrumbData($_SERVER['REQUEST_URI']);
	 // Début du fil d'Ariane
	 echo '<ul class="file-ariane">';

	 // Parcours des éléments du fil d'Ariane
	 foreach ($breadcrumb as $title => $url) {

			 echo '<li><a href="' . $url . '">' . $title . '</a></li>';
		 
	 }

	 // Fin du fil d'Ariane
	 echo '</ul>';
?>
<body>
<main>  
	 					<!-- section parent -->
                    <section class="fiche-produit">

	 					<!-- boite 1 gauche -->
	 					<div class="img-price-name">
						 <img src="<?= TELECHARGEMENT. "produit/". $Product_selected[$i]['photo'] ?>"
     class="img-fluid"
     alt="<?= $Product_selected[$i]["titre"] ?>"
     width="400"
     height="600"
     onmouseover="changeImage(this, '<?= TELECHARGEMENT. "produit/". $photo ?>')"
     onmouseout="changeImage(this, '<?= TELECHARGEMENT. "produit/". $Product_selected[$i]['photo'] ?>')">	
	 
	 
	 						<p class="text-center"><?=$Product_selected[$i]["titre"]?></p>
							<p class="text-center"><?=$Product_selected[$i]["prix"]." €"?></p>
						</div>

						<!-- boite 2 droite -->
						<div class="description-avis-quantité">
							
							<div class="description">
								<div class="share"><h2 class="title-fiche-produit">Description :</h2><a href="" onclick="copyCurrentUrl()"><iconify-icon icon="material-symbols:share" style="color: black;" width="30" height="22"></iconify-icon></a></div>
						 		<p class="para"><?= $Product_selected[$i]["description"]?></p>
						 	</div>
							 <script>
  function changeImage(element, newImage) {
    element.src = newImage;
  }
</script>

							<div class="avis">
								<h2 class="title-fiche-produit">Avis :</h2>
								<div class="avis-stars">
									<div class="stars">
									<iconify-icon icon="ic:round-star" style="color: black;" width="30" height="30"></iconify-icon>
									<iconify-icon icon="ic:round-star" style="color: black;" width="30" height="30"></iconify-icon>
									<iconify-icon icon="ic:round-star" style="color: black;" width="30" height="30"></iconify-icon>
									<iconify-icon icon="ic:round-star" style="color: black;" width="30" height="30"></iconify-icon>
									<iconify-icon icon="ic:round-star-outline" style="color: black;" width="30" height="30"></iconify-icon>									
									</div>
									<p><?= $Product_selected[$i]["avis"]?></p>
								</div>
						 	</div>

							<div class="quantity">
								<h2 class="title-fiche-produit">Quantité :</h2>
								<div class="panier-btn">
								<button class="panier-long" onclick="window.location.href='<?=BASE_PATH.'panier?id='.$Product_selected[$i]['id_montre']?>&cat=<?=$Product_selected[$i]['categorie_id']?>&p=prd_info';">
	 								<p class="ajouterpanier">Ajouter au panier</p>
									<iconify-icon class="icon-cart" icon="iconoir:cart" width="24" height="24"></iconify-icon>
								</button>
								</div>
							</div>

						</div>

					</section>
</main>
</body>
<?php 

include VIEWS.'inc/footer.php'; ?>