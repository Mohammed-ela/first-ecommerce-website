<?php  
$title = "Catalogue";
include VIEWS.'inc/header.php';
$allcategorie=Categorie::showDb();
$breadcrumb = App::getBreadcrumbData($_SERVER['REQUEST_URI']);
unset($breadcrumb['Catégorie']);
unset($breadcrumb['Produits']);
	 // Début du fil d'Ariane
	 echo '<ul class="breadcrumb">';

	 // Parcours des éléments du fil d'Ariane
	 foreach ($breadcrumb as $title => $url) {
		 // Lien actif (dernier élément du fil d'Ariane)
		 if ($url == '#') {
			 echo '<li class="active">' . $title . '</li>';
		 }

		 else {
			 echo '<li><a href="' . $url . '">' . $title . '</a></li>';
		 }
	 }

	 // Fin du fil d'Ariane
	 echo '</ul>';
?>
          <h1 class="">Catalogue</h1>  
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