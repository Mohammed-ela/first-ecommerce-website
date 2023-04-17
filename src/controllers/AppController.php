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
        $pseudo = strtolower(htmlspecialchars($_POST["pseudo"]));
        $email = strtolower(htmlspecialchars($_POST["email"]));
        $password = strtolower(htmlspecialchars($_POST["mdp"]));
        $adresse = strtolower(htmlspecialchars($_POST["adresse"]));
        $numero = strtolower(htmlspecialchars($_POST["numero"]));
        $statut = strtolower(htmlspecialchars($_POST["statut"]));

        $query = "UPDATE `user` SET `nom`=?,`prenom`=?,`pseudo`=?,`email`=?,`password`=?,`adresse`=?,`numero`=?,`statut`=? WHERE `id_user`=?";
        
        $requetePrepare = self::getDb()->prepare($query);
        
        $reponse = $requetePrepare->execute([
            $nom,
            $prenom,
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
    public static function login()
	{
        

		$query = "SELECT `id_user`, `nom`, `prenom`, `pseudo`, `email`, `password`, `adresse`, `numero`, `date_de_creation`, `statut` FROM `user`  WHERE `email` = ? AND `password` = ?";

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
            header("Location:" . BASE_PATH . "connection");
            $_SESSION["message"] = "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
            Bonjour" .$_SESSION['user']['nom']. "</div>";

            // echo($_SESSION['user']['nom']);
		}

       // erreur authentification
        if ($requetePreparee->rowCount() == 0) {
            header("Location:" . BASE_PATH . "connection");
            $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
            Erreur d'authentification ! veuillez réssayer
      </div>";
        }
    

    
        
	
//     if ($requetePreparee->rowCount() == 1) {
       
//         $_SESSION['email'] = $login;
//         $_SESSION['mdp'] = $mdp;
      
//         $authOK = true;
//         header("Location:" . BASE_PATH . "");

//         }else{
//         $authOK = false;
//         $_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
//         Erreur d'authentification ! veuillez réssayer
//   </div>";
//   header("Location:" . BASE_PATH . "connection");
//   exit;
//     }
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