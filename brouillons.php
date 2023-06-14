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
        <h1 class="text-center p-5"><?= $h1 ?></h1>  
        <main class="produit">               
 
        <?php    
        $compteur = 0;
        for ($i=0; $i < count($allProduct) ; $i++) {  

            if ($_GET['id']==$allProduct[$i]['categorie_id']) {
                //nouveau tableau avec les bon id correpodant au get
                $tabprod=array($allProduct[$i]);
            
        ?>



    <?php

for ($x=0; $x < count($tabprod) ; $x++) {

if (!($compteur%4)) {
    echo("<div class='element-prd'>");  
}

    $compteur++;
    ?>  

                <a href="Produit_info?id=<?=$tabprod[$x]["id_montre"]?>"><img src="<?= TELECHARGEMENT. "produit/". $tabprod[$x]["photo"] ?>" alt="<?= $tabprod[$x]["titre"] ?>"></a>
                    <h2 class="text-center"><?= $tabprod[$x]["titre"]?></h2>
                    <h2 class="text-center"><?= $tabprod[$x]["prix"]." €"?></h2>
                            <?php
                            if (!($compteur%4)) {
                                echo("</div>");
                            }            
                            ?>

                        <?php
                                    }

                                }
                            }

                        ?>
        </main>
</body>
<?php  include VIEWS.'inc/footer.php';


public static function login()
{

    $requete = "SELECT `password` FROM `user` WHERE `email` = ?";

    $requetePreparees = self::getDb()->prepare($requete);

    $rep = $requetePreparees->execute([
        $_POST["monemail"]
    ]);

    if ($rep) {
        $mdp_hash = $requetePreparees->fetch(PDO::FETCH_ASSOC);
    }

    $Password_bypost = $_POST['monmdp'];

    if (password_verify($Password_bypost, $mdp_hash['password'])) {
        $query = "SELECT `id_user`, `nom`, `prenom`, `pp`, `pseudo`, `email`, `password`, `adresse`, `numero`, `date_de_creation`, `statut` FROM `user`  WHERE `email` = ? AND `password` = ?";
        $queryPreparee = self::getDb()->prepare($query);
        $reponse = $queryPreparee->execute([
            $_POST["monemail"],
            $mdp_hash['password']
        ]);

    }
    // si authentification reussi
		if ($queryPreparee->rowCount() == 1)
		{
            $_SESSION['user']= $Users_connecte;
            
            header("Location:" . BASE_PATH . "");
            $_SESSION["message"] = "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
            Bonjour " .$_SESSION['user']['prenom']." ! </div>";

		}else {
        header("Location:" . BASE_PATH . "connection");
            $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
            Votre nom de compte ou votre mot de passe est incorrect.
      </div>";
    }
}

?>