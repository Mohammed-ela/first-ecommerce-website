<?php
//que pour l'index
class AppController extends Db
{

    public static function index()
    {
        //page d'accueil a modifier front
        echo "je suis bien dans la page d'accueil<br>";
       
        
        include VIEWS . "app/home.php";
    }

    public static function tab_user()
    {
        //portier pour accede a l'administration ! statu =1
        
    }

    public static function connection()
    {
        //portier pour accede a l'administration ! statu =1

        
    }

    public static function enregistrement()
    {

        

        $nom = strtolower(htmlspecialchars($_POST["nom"]));
        $prenom = strtolower(htmlspecialchars($_POST["prenom"]));
        $pp = $_FILES["pp"];
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
        

		$query = "SELECT `id_user`, `nom`, `prenom`, `pp`, `pseudo`, `email`, `password`, `adresse`, `numero`, `date_de_creation`, `statut` FROM `user`  WHERE `email` = ? AND `password` = ?";

		$requetePreparee = self::getDb()->prepare($query);
        
        $reponse = $requetePreparee->execute([
			$_POST["monemail"],
			$_POST["monmdp"]
	]);
        // tableau associatif d'element :
        $Users_connecte = $requetePreparee->fetch(PDO::FETCH_ASSOC);
		

		//verifie si la requete s'est bien déroulé
		if (!$reponse)
		{
            $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
                     Erreur au niveau de la requete SQL !
               </div>";
		}

		// si authentification reussi
		if ($requetePreparee->rowCount() == 1)
		{
            $_SESSION['user']= $Users_connecte;
            header("Location:" . BASE_PATH . "");
            $_SESSION["message"] = "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
            Bonjour " .$_SESSION['user']['prenom']. "</div>";

            // echo($_SESSION['user']['nom']);
		}

       // erreur authentification
        if ($requetePreparee->rowCount() == 0) {
            header("Location:" . BASE_PATH . "connection");
            $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
            Erreur d'authentification ! veuillez réssayer
      </div>";
        }
    

    
        
	

	}

    public static function isconnect()
    {
        if ($authOK = 'false') {
            return false;
        }else {
            return true;
        }
    }

}