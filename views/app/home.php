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
                <li class="img-box"><a href="<?=BASE_PATH. "Produit_info?id=".$tabprod["id_montre"]?>"><img src="<?= TELECHARGEMENT. "produit/". $tabprod["photo"] ?>" alt="<?= $tabprod["titre"] ?>"></a></li>
                <li><a href="<?=BASE_PATH. "Produit_info?id=".$tabprod["id_montre"]?>"> <?= $tabprod["titre"]?> </a> </li>
                
                <li><p><?= $tabprod["prix"]." €"?></p></li>

                <button class="bouton-cart" onclick="window.location.href='<?=BASE_PATH.'panier?id='.$tabprod['id_montre']?>&cat=<?=$tabprod['categorie_id']?>&p=home';">
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


        <section class="produit-populaires">
    <div class="title">
        <p>Les avis clients</p>
        <div class="fleche">
            <iconify-icon class="button-prev" icon="iconamoon:arrow-left-2-thin" style="color: #B0B0B0;" width="30" height="30"></iconify-icon>
            <iconify-icon class="button-next" icon="iconamoon:arrow-right-2-thin" style="color: #B0B0B0;" width="30" height="30"></iconify-icon>
        </div>
    </div>
    <div style="overflow: hidden;" class="swiper-container mt-10 pb-1">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="element-avis">
                    <div class="element-inside">
                        <div class="pseudo-img">
                            <img src="<?= TELECHARGEMENT . "produit/no-image.png" ?>" class="img-pp" width="80"
                                height="80" alt="profil-pic">
                            <div class="pseudo">
                                <p>Lucas Martin</p>
                            </div>
                        </div>
                        <div class="description">
                            <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem
                                ipsumLorem ipsumLorem ipsumLorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="element-avis">
                    <div class="element-inside">
                        <div class="pseudo-img">
                            <img src="<?= TELECHARGEMENT . "produit/no-image.png" ?>" class="img-pp" width="80"
                                height="80" alt="profil-pic">
                            <div class="pseudo">
                                <p>Lucas Martin</p>
                            </div>
                        </div>
                        <div class="description">
                            <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem
                                ipsumLorem ipsumLorem ipsumLorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="element-avis">
                    <div class="element-inside">
                        <div class="pseudo-img">
                            <img src="<?= TELECHARGEMENT . "produit/no-image.png" ?>" class="img-pp" width="80"
                                height="80" alt="profil-pic">
                            <div class="pseudo">
                                <p>Lucas Martin</p>
                            </div>
                        </div>
                        <div class="description">
                            <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem
                                ipsumLorem ipsumLorem ipsumLorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="element-avis">
                    <div class="element-inside">
                        <div class="pseudo-img">
                            <img src="<?= TELECHARGEMENT . "produit/no-image.png" ?>" class="img-pp" width="80"
                                height="80" alt="profil-pic">
                            <div class="pseudo">
                                <p>Lucas Martin</p>
                            </div>
                        </div>
                        <div class="description">
                            <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem
                                ipsumLorem ipsumLorem ipsumLorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="element-avis">
                    <div class="element-inside">
                        <div class="pseudo-img">
                            <img src="<?= TELECHARGEMENT . "produit/no-image.png" ?>" class="img-pp" width="80"
                                height="80" alt="profil-pic">
                            <div class="pseudo">
                                <p>Lucas Martin</p>
                            </div>
                        </div>
                        <div class="description">
                            <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem
                                ipsumLorem ipsumLorem ipsumLorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="element-avis">
                    <div class="element-inside">
                        <div class="pseudo-img">
                            <img src="<?= TELECHARGEMENT . "produit/no-image.png" ?>" class="img-pp" width="80"
                                height="80" alt="profil-pic">
                            <div class="pseudo">
                                <p>Lucas Martin</p>
                            </div>
                        </div>
                        <div class="description">
                            <p>Lorem ipsum Lorem ipsum Lorem ipsum Lorem ipsumLorem ipsum Lorem ipsumLorem
                                ipsumLorem ipsumLorem ipsumLorem ipsum</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Si il y'a de nouvelle diapo .swiper-slide -->
        </div>
            


        <div class="livraison-qualite-garanti">

            <div class="livraison">
                <iconify-icon icon="bi:box-seam-fill" style="color: #004870;" width="50" height="50"></iconify-icon>
                <div class="text-desc">
                    <p class="title-desc">Livraison Gratuite</p>
                    <p>A partir de 50 € d’achats !</p>
                </div>
            </div>

            <div class="qualite">
                <iconify-icon icon="mdi:crown" style="color: #004870;" width="50" height="50"></iconify-icon>
                <div class="text-desc">
                    <p class="title-desc">Qualité Française</p>
                    <p>La qualité est notre priorité.</p>
                </div>
            </div>

            <div class="garanti">
                <iconify-icon icon="bi:box-seam-fill" style="color: #004870;" width="50" height="50"></iconify-icon>
                <div class="text-desc">
                    <p class="title-desc">Garantis 2 ans</p>
                    <p>Sur tout nos produits !</p>
                </div>
            </div>

        </div>

</section>
   
</body>

<?php  

include VIEWS.'inc/footer.php'; 
// if (isset($_SESSION['user'])) {
//     app::showArray($_SESSION['user']);
// }
?>
