<?php

// que pour l'inscription
class ProduitController
{
	public static function register()
	{



		if (!empty($_POST)) 					// Si le formulaire est rempli
		{
			Produit::verifyData($_POST);			// On vérifie toutes les infos

			if (empty($_SESSION["message"]))	// Si y'a pas d'erreur
			{
				$user = new Produit();

				$user->createFromPost($_POST);

				$user->insertDb();

				if (empty($_SESSION["message"]))
				{
					$_SESSION["message"] .= "Bravo ! Produit ajouté ! <br>";
					header("Location:" . BASE_PATH . "categorie");

				}
				else
				{
					$_SESSION["message"] .= "Ca a pas marché<br>";

				}
			}
		}

		include VIEWS . "produit/new_produit.php";
		// echo "Mon controller register fonctionne hyper bien<br>";
	}

	public static function showDb()
	{
			// nouvelle user
			$user = new Produit();
			// requete select ALL

			$user->showDb();

		include VIEWS . "admin/produit.php";
		}

	public static function remove()
	{
			// nouvelle user
			$user = new Produit();
			// requete select ALL

			$user->remove();
		
			
		include VIEWS . "admin/produit.php";
		
	}

	public static function modifier()
	{
			// nouvelle user
			$user = new Produit();
			// requete select ALL

			$user->modifier();
		
			//header location vers le front 
		include VIEWS . "produit/modifier.php";
	}

		
	
}