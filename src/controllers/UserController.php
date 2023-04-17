<?php

// que pour l'inscription
class UserController
{
	public static function register()
	{



		if (!empty($_POST)) 					// Si le formulaire est rempli
		{
			User::verifyData($_POST);			// On vérifie toutes les infos

			if (empty($_SESSION["message"]))	// Si y'a pas d'erreur
			{
				$user = new User();

				$user->createFromPost($_POST);

				$user->insertDb();

				if (empty($_SESSION["message"]))
				{
					$_SESSION["message"] .= "Veuillez vous connectez <br>";
					header("Location:" . BASE_PATH . "connexion");

				}
				else
				{
					$_SESSION["message"] .= "Ca a pas marché<br>";

				}
			}
		}

		include VIEWS . "user/register_form.php";
		// echo "Mon controller register fonctionne hyper bien<br>";
	}

	public static function showDb()
	{
			// nouvelle user
			$user = new User();
			// requete select ALL

			$user->showDb();

		include VIEWS . "admin/administration.php";
		}

	public static function connection()
	{

		include VIEWS . "user/connection.php";
		
	}

	public static function remove()
	{
			// nouvelle user
			$user = new User();
			// requete select ALL

			$user->remove();
		
			
		include VIEWS . "user/administration.php";
		
	}

	public static function modifier()
	{
			// nouvelle user
			$user = new User();
			// requete select ALL

			$user->modifier();
		
			//header location vers le front 
		include VIEWS . "user/modifier.php";
	}
	
		
}