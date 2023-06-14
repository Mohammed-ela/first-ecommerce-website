<?php  
$title = "Synkro";
include VIEWS.'inc/header.php'; 
?>

<style>

p{
    font-size:25px;
}
</style>
<body>
    
<h1> <?=$connected=='false' ? "Bienvenue ".$_SESSION['user']['pseudo']." !" : "";?>  </h1>
    <main>

    <?php  
    if (isset($_SESSION['user'])) {
        var_dump($_SESSION['user']);
    }
    ?>
    

    </main>
</body>

<?php  include VIEWS.'inc/footer.php'; ?>