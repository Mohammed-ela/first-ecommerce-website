<?php  
$title = "Produit";
include VIEWS.'inc/header.php';
$allProduct=Produit::showDb();

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
?>
<body>

        <main>               
        <h1 class="text-center p-5"><?= $h1 ?></h1>   
        <div class="container">
        <?php    
        $compteur = 0;
        for ($i=0; $i < count($allProduct) ; $i++) {  

            if ($_GET['id']==$allProduct[$i]['categorie_id']) {
                //nouveau tableau avec les bon id correpodant au get
                $tabprod=array($allProduct[$i]);
            
        ?>



    <?php

    for ($x=0; $x < count($tabprod) ; $x++) {

    if (!($compteur%3)) {
        echo("<div class='d-flex justify-content-xxl-center'>");
        
    }

    $compteur++;
    ?>  
    

                <div class="col-md-3">
                <a href="Produit_info?id=<?=$tabprod[$x]["id_montre"]?>"><img src="<?= TELECHARGEMENT. "produit/". $tabprod[$x]["photo"] ?>" alt="<?= $tabprod[$x]["titre"] ?>"></a>
                    <h2 class="text-center"><?= $tabprod[$x]["titre"]?></h2>
                    <h2 class="text-center"><?= $tabprod[$x]["prix"]." €"?></h2>
                </div>
                            <?php
                            if (!($compteur%3)) {
                                echo("</div>");
                            }            
                            ?>

                        <?php
                                    }

                                }
                            }

                        ?>
                </div>  <!-- div de la row -->
                
                </main>
</body>
<?php  include VIEWS.'inc/footer.php'; ?>