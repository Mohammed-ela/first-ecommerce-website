<?php  
$title = "Synkro";
include VIEWS.'inc/header.php'; 
$allProduct=Produit::showDb();

$imagePaths = array(TELECHARGEMENT . "produit/" . $allProduct[0]["photo"],TELECHARGEMENT . "produit/" . $allProduct[1]["photo"],TELECHARGEMENT . "produit/" . $allProduct[2]["photo"]);

?>

<body>
    <main>
        <!-- le carousel  -->
        <section class="first-carousel" id="carousel-section">
            <div class="swiper-wrapper">
                <?php foreach ($imagePaths as $imagePath) : ?>
                <div class="swiper-slide">
                    <img src="<?= $imagePath ?>" alt="Image" height="500" width="100%">
                </div>
                <?php endforeach; ?>
            </div>
                    <!-- les boutons de navigations right / left -->
                <iconify-icon class="precedent" id="arrows-left" icon="iconamoon:arrow-left-6-circle-duotone"  width="34" height="58" onmouseover="this.classList.add('icon-hover-color')" onmouseout="this.classList.remove('icon-hover-color')"></iconify-icon>
                <iconify-icon class="suivant" id="arrows-right" icon="iconamoon:arrow-right-6-circle-duotone"  width="34" height="58" onmouseover="this.classList.add('icon-hover-color')" onmouseout="this.classList.remove('icon-hover-color')"></iconify-icon>
        </section>


        <!-- les 3 boutons en dessous  -->
        <div id="carousel-pagination" class="carousel-pagination">
    <?php for ($i = 0; $i < count($imagePaths); $i++) : ?>
        <button class="carousel-pagination-button custom-button" data-index="<?= $i ?>"></button>
    <?php endfor; ?>
        </div>

        <div class="intro">
            <p class="presentation"> Bienvenue sur Synkro notre site d'e-commerce dédié aux montres connectées pour les sportifs passionnés ! Découvrez une sélection exceptionnelle de montres conçues pour suivre et améliorer vos performances sportives </p>
        </div>


        <section class="produit-populaire">
            <div class="title">
                <p>Produits populaires</p>
                <a href="#">Voir tout</a>
            </div>
            <div class="nos-produits-populaire"> 
        <?php    
            $cpt=0;
            foreach ($allProduct as $tabprod) { 
            $cpt++;
        ?>
            <div class="element-prd">
                <li class="img-box"><a href="Produit_info?id=<?=$tabprod["id_montre"]?>"><img src="<?= TELECHARGEMENT. "produit/". $tabprod["photo"] ?>" alt="<?= $tabprod["titre"] ?>"></a></li>
                <li><a href="Produit_info?id=<?=$tabprod["id_montre"]?>"> <?= $tabprod["titre"]?> </a> </li>
                <li><p><?= $tabprod["prix"]." €"?></p></li>

                <button class="bouton-cart" onclick="window.location.href='panier?id=<?=$tabprod['id_montre']?>&cat=<?=$tabprod['categorie_id']?>';">
                    <iconify-icon class="icon-cart" icon="iconoir:cart" width="24" height="24"></iconify-icon>
                </button>
            </div>
           
<?php
if ($cpt == 4) {
    break;
}
}
?>
                    
            </div>
        </section>


        <section class="produit-populaire">
            <div class="title">
                <p>Les promotions</p>
                <a href="#">Voir tout</a>
            </div>
            <div class="nos-produits-populaire"> 
        <?php    
            $cpt=0;
            shuffle($allProduct);
            foreach ($allProduct as $tabprod) { 
            $cpt++;
        ?>
            <div class="element-prd">
                <li class="img-box"><a href="Produit_info?id=<?=$tabprod["id_montre"]?>"><img src="<?= TELECHARGEMENT. "produit/". $tabprod["photo"] ?>" alt="<?= $tabprod["titre"] ?>"></a></li>
                <li><a href="Produit_info?id=<?=$tabprod["id_montre"]?>"> <?= $tabprod["titre"]?> </a> </li>
                <li class="price"><p class="prix-promo"><?= $tabprod["prix"]." €"?></p> <p><?= $tabprod["prix"]-0.3* $tabprod["prix"]." €"?></p></li>

                <button class="bouton-cart" onclick="window.location.href='panier?id=<?=$tabprod['id_montre']?>&cat=<?=$tabprod['categorie_id']?>';">
                    <iconify-icon class="icon-cart" icon="iconoir:cart" width="24" height="24"></iconify-icon>
                </button>
            </div>
           
<?php
if ($cpt == 4) {
    break;
}
}
?>
                    
    </div>
</section>




        <section class="produit-populaire">
            <div class="title">
                <p>Les avis clients</p>
                    <div class="fleche">
                    <iconify-icon icon="iconamoon:arrow-left-2-thin" style="color: #B0B0B0;" width="30" height="30"></iconify-icon>
                    <iconify-icon icon="iconamoon:arrow-right-2-thin" style="color: #B0B0B0;" width="30" height="30"></iconify-icon>
                    </div>
                    
            </div>

            <div class="nos-produits-populaire"> 
        
              
        </section>
           







    </main>
</body>

<?php  
include VIEWS.'inc/footer.php'; 
if (isset($_SESSION['user'])) {
    app::showArray($_SESSION['user']);
}
?>
