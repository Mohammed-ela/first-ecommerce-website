<?php  
$title = "Catalogue";
include VIEWS.'inc/header.php';
$allcategorie=Categorie::showDb();
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