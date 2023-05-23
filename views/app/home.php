<?php  

$title = "Synkro";
include VIEWS.'inc/header.php'; 

?>
<h1>MA PAGE INDEX.PHP</h1>



<p> <?=$connected=='false' ? "Bienvenue ".$_SESSION['user']['pseudo'] : "";?>  </p>

<?php  
// var_dump($_SESSION['user']);
?>

<?php  include VIEWS.'inc/footer.php'; ?>