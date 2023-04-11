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
					$_SESSION["message"] .= "Ca a marché<br>";
					header("Location:" . BASE_PATH . "connexion");
					exit;
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

	public static function tab_user()
	{

			$user = new User();
			$requete = User::showDb("SELECT * FROM `user` ");
			$user->showDb($requete);

		include VIEWS . "admin/administration.php";
		}

	
		
}