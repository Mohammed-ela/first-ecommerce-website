<?php
//que pour l'index
class AppController extends Db
{

    public static function index()
    {
        //page d'accueil a modifier front
       
        
        include VIEWS . "app/home.php";
    }

    public static function enregistrement()
    {

        

        $nom = strtolower(htmlspecialchars($_POST["nom"]));
        $prenom = strtolower(htmlspecialchars($_POST["prenom"]));
        $pp = htmlspecialchars($_POST["pp"]);
        $pseudo = strtolower(htmlspecialchars($_POST["pseudo"]));
        $email = strtolower(htmlspecialchars($_POST["email"]));
        $password = strtolower(htmlspecialchars($_POST["mdp"]));
        $adresse = strtolower(htmlspecialchars($_POST["adresse"]));
        $numero = strtolower(htmlspecialchars($_POST["numero"]));
        $statut = strtolower(htmlspecialchars($_POST["statut"]));

        $query = "UPDATE `user` SET `nom`=?,`prenom`=?,`pp`=?,`pseudo`=?,`email`=?,`password`=?,`adresse`=?,`numero`=?,`statut`=? WHERE `id_user`=?";
        
        $requetePrepare = self::getDb()->prepare($query);
        
        $reponse = $requetePrepare->execute([
            $nom,
            $prenom,
            $pp,
            $pseudo,
            $email,
            $password,
            $adresse,
            $numero,
            $statut,
            $_GET["id"]
        ]);
        if ($reponse)
        {
            $_SESSION["message"] = "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
                  Bravo votre utilisateur qui porte le nom " . $nom . " a bien été mis à jour !
            </div>";
            header("Location:" . BASE_PATH . "administration");
            exit;
        }else
        {
            $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
                  ALERTE ! Il y a eu une erreur lors de la modification de l'utilisateur !
            </div>";
            header("Location:" . BASE_PATH . "administration");
            exit;
        }
        
    }

    
	public static function enregistrement_cat()
    {

        $name = strtolower(htmlspecialchars($_POST["name"]));
        $picture = strtolower(htmlspecialchars($_POST["picture"]));
        $description = strtolower(htmlspecialchars($_POST["description"]));
       

        $query = "UPDATE `categorie` SET `name`=?,`picture`=?,`description`=? WHERE `id_categorie`=?";
        
        $requetePrepare = self::getDb()->prepare($query);
        
        $reponse = $requetePrepare->execute([
            $name,
            $picture,
            $description,
            $_GET["id"]
        ]);
        if ($reponse)
        {
            $_SESSION["message"] = "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
                  Bravo votre categorie qui porte comme ancien nom : " . $name . " a bien été mis à jour !
            </div>";
            header("Location:" . BASE_PATH . "categorie");
            exit;
        }else
        {
            $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
                  ALERTE ! Il y a eu une erreur lors de la modification de la categorie !
            </div>";
            header("Location:" . BASE_PATH . "categorie");
            exit;
        }
        
    }

    public static function enregistrement_prd()
    {

        $titre = strtolower(htmlspecialchars($_POST["titre"]));
        $description = strtolower(htmlspecialchars($_POST["description"]));
        $couleur = strtolower(htmlspecialchars($_POST["couleur"]));
        $autonomie = strtolower(htmlspecialchars($_POST["autonomie"]));
        $photo = strtolower(htmlspecialchars($_POST["photo"]));
        $avis = strtolower(htmlspecialchars($_POST["avis"]));
        $prix = strtolower(htmlspecialchars($_POST["prix"]));
       

        $query = "UPDATE `montre` SET `titre`=?,`description`=?,`couleur`=?,`autonomie`=?,`photo`=?,`avis`=?,`prix`=? WHERE `id_montre`=?";
        
        $requetePrepare = self::getDb()->prepare($query);
        
        $reponse = $requetePrepare->execute([
            $titre,
            $description,
            $couleur,
            $autonomie,
            $photo,
            $avis,
            $prix,
            $_GET["id"]
        ]);
        if ($reponse)
        {
            $_SESSION["message"] = "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
                  Bravo votre produit qui porte comme nom : " . $name . " a bien été mis à jour !
            </div>";
            header("Location:" . BASE_PATH . "produit");
            exit;
        }else
        {
            $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
                  ALERTE ! Il y a eu une erreur lors de la modification de la categorie !
            </div>";
            header("Location:" . BASE_PATH . "produit");
            exit;
        }
        
    }

	
    public static function login()
	{
        
        $requete = "SELECT `password` FROM `user` WHERE `email` = ?";
        $requetePreparees = self::getDb()->prepare($requete);
        // password_verify($_POST["monmdp"], $hash)
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
        // tableau associatif d'element :
        $Users_connecte = $queryPreparee->fetch(PDO::FETCH_ASSOC);
		

		//verifie si la requete s'est bien déroulé
		if (!$reponse)
		{
            $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
                     Erreur au niveau de la requete SQL !
               </div>";
		}

		// si authentification reussi
		if ($queryPreparee->rowCount() == 1)
		{
            $_SESSION['user']= $Users_connecte;
            header("Location:" . BASE_PATH . "");
            $_SESSION["message"] = "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
            Bonjour " .$_SESSION['user']['prenom']." ! </div>";

		}
        // si authentification échoue
	}else {
        header("Location:" . BASE_PATH . "connection");
            $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
            Votre nom de compte ou votre mot de passe est incorrect.
      </div>";
    }
}


}