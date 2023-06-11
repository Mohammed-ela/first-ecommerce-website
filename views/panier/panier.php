<?php  
$title = "Synkro";
include VIEWS.'inc/header.php'; 
$panier=PanierController::show_panier();

?>


<body>
    <main>
    <h1>bonjour</h1>
    <?php  
    if (isset($_SESSION['panier'])) {
        var_dump($_SESSION['panier']);
    }
    var_dump($panier);
    ?>

     

    </main>
</body>

<?php  include VIEWS.'inc/footer.php'; ?>