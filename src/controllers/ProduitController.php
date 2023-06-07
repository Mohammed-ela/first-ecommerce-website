<?php

// que pour l'inscription
class ProduitController
{
	public static function register()
	{



		if (!empty($_POST)) 					// Si le formulaire est rempli
		{

			Produit::verifyData($_POST);		// On vérifie toutes les infos

			if (empty($_SESSION["message"]))	// Si y'a pas d'erreur
			{
				// var_dump($_POST);
				// $categorie_id = $_POST['categorie'];

				$product = new Produit();
	
				$product->createFromPost($_POST);

				$product->insertDb();

				if (empty($_SESSION["message"]))
				{
					$_SESSION["message"] .= "Bravo ! Produit ajouté ! <br>";
					header("Location:" . BASE_PATH . "produit");

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
			$product = new Produit();
			// requete select ALL

			$product->showDb();

		include VIEWS . "admin/produit.php";
		}

	public static function remove()
	{
			// nouvelle product
			$product = new Produit();
			// requete select ALL

			$product->remove();
		
			
		include VIEWS . "admin/produit.php";
		
	}

	public static function modifier()
	{
			// nouvelle product
			$product = new Produit();
			// requete select ALL

			$product->modifier();
		
			//header location vers le front 
		include VIEWS . "produit/modifier.php";
	}

	public static function fetchAllProduct()
    {
        $produit = new Produit();
		
     	$produit->showDb();

		include VIEWS . "produit/produit.php";
    }

	public static function fetchOneProduct(){

		$produit = new Produit();
		
     	$produit->Produit_info();

		include VIEWS . "produit/produit_info.php";
	}
		
	
}