<?php  
$title = "Catalogue";
include VIEWS.'inc/header.php';
$allcategorie=Categorie::showDb();
$breadcrumb = App::getBreadcrumbData($_SERVER['REQUEST_URI']);
unset($breadcrumb['Catégorie']);
unset($breadcrumb['Produits']);
	 // Début du fil d'Ariane
	 echo '<ul class="file-ariane">';
	 $count = count($breadcrumb);
	 $current = 0;
	 foreach ($breadcrumb as $title => $url) {

		$current++;

		echo '<li><a href="' . $url . '">' . $title . '</a></li>';
	
		if ($current < $count) {
			echo '<iconify-icon icon="ep:arrow-right" style="color: black;" width="18" height="18"></iconify-icon>';
		}
		 
	 }

	 echo '</ul>';
?>

	<main class="categorie">

<?php for ($i=0; $i < count($allcategorie) ; $i++) { ?>    

    <div class="element-cat">
       <a href="Produit?id=<?=$allcategorie[$i]["id_categorie"]?>"><img src="<?= TELECHARGEMENT. "categorie/". $allcategorie[$i]["picture"] ?>" alt="categorie de montre"></a>
       <h2><?=$allcategorie[$i]["name"]?></h2>
    </div>

<?php
}
?>
    </div>  
          </div>     
        </main>

<?php  include VIEWS.'inc/footer.php'; ?>