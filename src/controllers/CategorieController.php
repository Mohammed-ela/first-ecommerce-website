<?php

// que pour l'inscription
class CategorieController
{
	public static function register()
	{



		if (!empty($_POST)) 					// Si le formulaire est rempli
		{
			Categorie::verifyData($_POST);			// On vérifie toutes les infos

			if (empty($_SESSION["message"]))	// Si y'a pas d'erreur
			{
				$categorie = new Categorie();

				$categorie->createFromPost($_POST);

				$categorie->insertDb();

				if (empty($_SESSION["message"]))
				{
					$_SESSION["message"] .= "Bravo ! Categorie ajouté ! <br>";
					header("Location:" . BASE_PATH . "categorie");

				}
				else
				{
					$_SESSION["message"] .= "Ca a pas marché<br>";

				}
			}
		}

		include VIEWS . "categorie/new_categorie.php";
		// echo "Mon controller register fonctionne hyper bien<br>";
	}

	public static function showDb()
	{
			// nouvelle user
			$categorie = new Categorie();
			// requete select ALL

			$categorie->showDb();

		include VIEWS . "admin/categorie.php";
		}

	public static function remove()
	{
			// nouvelle categorie
			$categorie = new Categorie();
			// requete select ALL

			$categorie->remove();
		
			
		include VIEWS . "admin/categorie.php";
		
	}

	public static function modifier()
	{
			// nouvelle categorie
			$categorie = new Categorie();
			// requete select ALL

			$categorie->modifier();
		
			//header location vers le front 
		include VIEWS . "categorie/modifier.php";
	}

	public static function fetchAllCategorie()
    {
        $categorie = new Categorie();
		
     	$categorie->showDb();

		include VIEWS . "categorie/categorie.php";
    }
		
}