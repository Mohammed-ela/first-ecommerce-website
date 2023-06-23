<?php  
$title = "Produit";
include VIEWS.'inc/header.php';
$allProduct=Produit::showDb();


//verifions si l'id de la montre existe bien 
                if ($_GET['id']=='2') {
                    $h1='Montre Connecté';
                }elseif ($_GET['id']=='6') {
                    $h1='Montre de Sport';
                }elseif ($_GET['id']=='7') {
                    $h1='Montre de Luxe';
                }else {
            $_SESSION["message"] .= "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
				  ERREUR 404 page produit.php dossier produit
			</div>";
			header("Location:" . BASE_PATH . " ");
			exit;
                } 

// Récupération des données nécessaires
$breadcrumb = App::getBreadcrumbData($_SERVER['REQUEST_URI']);
unset($breadcrumb['Produits']);
// Début du fil d'Ariane
echo '<ul class="file-ariane">';

// Parcours des éléments du fil d'Ariane
foreach ($breadcrumb as $title => $url) {
    // Lien actif (dernier élément du fil d'Ariane)
    if ($url == '#') {
        echo '<li class="active">' . $title . '</li>';
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
        <h1 class="title-h1"><?= $h1 ?></h1>
        <h2 class="title-h2">Nos produits</h2>  
        <main>
            <div class="nos-produits"> 
        <?php    
for ($i=0; $i < count($allProduct) ; $i++) {  

    if ($_GET['id']==$allProduct[$i]['categorie_id']) {
                //nouveau tableau avec les bon id correpodant au get
                $tabprod=array($allProduct[$i]); 
                for ($x=0; $x < count($tabprod) ; $x++) {   
        ?>


            <div class="element-prd">
                <li class="img-box"><a href="Produit_info?id=<?=$tabprod[$x]["id_montre"]?>&cat=<?=$tabprod[$x]["categorie_id"]?>"><img src="<?= TELECHARGEMENT. "produit/". $tabprod[$x]["photo"] ?>" alt="<?= $tabprod[$x]["titre"] ?>"></a></li>
                <li><a href="Produit_info?id=<?=$tabprod[$x]["id_montre"]?>&cat=<?=$tabprod[$x]["categorie_id"]?>"> <?= $tabprod[$x]["titre"]?> </a> </li>
                <li><p><?= $tabprod[$x]["prix"]." €"?></p></li>

                <button class="bouton-cart" onclick="window.location.href='panier?id=<?=$tabprod[$x]['id_montre']?>&cat=<?=$tabprod[$x]['categorie_id']?>&p=prd';">
                    <iconify-icon class="icon-cart" icon="iconoir:cart" width="24" height="24"></iconify-icon>
                </button>
            </div>
           
<?php
        }
    }
}
?>
                    
            </div>

    <div class="h2-flex"><h2 class="title-h2">Vous pourriez aimez</h2> <a href="#"><h2 class="title-h2">voir tout</h2></a></div>
        
       <div class="sugestion">
       <?php    

    // Tableau pour stocker les éléments aléatoires
    $tabprodrandom = array();
    
    while (count($tabprodrandom) < 4) {
        // Génération d'un index aléatoire
        $randomIndex = rand(0, count($allProduct) - 1);
      
        // Récupération de l'élément correspondant à l'index aléatoire
        $randomProduct = $allProduct[$randomIndex];
      
        // Vérification si l'élément correspond à une catégorie
        if ($_GET['id'] == $randomProduct['categorie_id']) {
            // Ajout de l'élément dans le nouveau tableau en evitant les occurances
            if (!in_array($randomProduct, $tabprodrandom)) {
                $tabprodrandom[] = $randomProduct;
            }
        }
    }
    
    // Affichage des éléments du nouveau tableau
    for ($x = 0; $x < count($tabprodrandom); $x++) {
        ?>
       <div class="element-prd">
                <li class="img-box"><a href="Produit_info?id=<?=$tabprodrandom[$x]["id_montre"]?>"><img src="<?= TELECHARGEMENT. "produit/". $tabprodrandom[$x]["photo"] ?>" alt="<?= $tabprodrandom[$x]["titre"] ?>"></a></li>
                <li><a href="Produit_info?id=<?=$tabprodrandom[$x]["id_montre"]?>"> <?= $tabprodrandom[$x]["titre"]?> </a> </li>
                <li><p><?= $tabprodrandom[$x]["prix"]." €"?></p></li>
                <button class="bouton-cart" onclick="window.location.href='panier?id=<?=$tabprod[$x]['id_montre']?>&cat=<?=$tabprod[$x]['categorie_id']?>';">
                    <iconify-icon class="icon-cart" icon="iconoir:cart" width="24" height="24"></iconify-icon>
                </button>
                
        </div>
        <?php    
                 }
                if (!empty($_SESSION['panier'])) {
                    var_dump($_SESSION['panier']);
                }
               
                
        ?>
       </div>










        </main>
</body>
<?php  include VIEWS.'inc/footer.php'; ?>