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
				$user = new Categorie();

				$user->createFromPost($_POST);

				$user->insertDb();

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
			$user = new Categorie();
			// requete select ALL

			$user->showDb();

		include VIEWS . "admin/categorie.php";
		}

	public static function remove()
	{
			// nouvelle user
			$user = new Categorie();
			// requete select ALL

			$user->remove();
		
			
		include VIEWS . "admin/categorie.php";
		
	}

	public static function modifier()
	{
			// nouvelle user
			$user = new Categorie();
			// requete select ALL

			$user->modifier();
		
			//header location vers le front 
		include VIEWS . "categorie/modifier.php";
	}

	public static function fetchAllCategorie()
    {
        $categorie = new Categorie();
        $allCategorie = $categorie->showDb();
        return $allCategorie;
    }
		
}