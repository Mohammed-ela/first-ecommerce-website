<?php  
$title = "Catalogue";
include VIEWS.'inc/header.php';
$allcategorie=Categorie::showDb();
?>

        <main>
          <h1 class="text-center p-5">Catalogue</h1>  
          <div class="container">    
            <div class="row">   
          <?php
for ($i=0; $i < count($allcategorie) ; $i++) {          
?>



    <div class="col text-center ">
       <a href="Produit?id=<?=$allcategorie[$i]["id_categorie"]?>"><img src="<?= TELECHARGEMENT. "categorie/". $allcategorie[$i]["picture"] ?>" alt="categorie de montre"></a>
        <h2 class="text-center"><?=$allcategorie[$i]["name"]?></h2>
    </div>








<?php
}
?>
    </div>  
          </div>     
        </main>

<?php  include VIEWS.'inc/footer.php'; ?>