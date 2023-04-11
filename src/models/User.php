<?php

class User extends Db
{
	private $id_user;
	private $first_name;
	private $last_name;
	private $pseudo;
	private $mail;
	private $password;
	private $address;
	private $numero;
	private $date_creation;
	private $statut;

	public function createFromPost(array $dataFromPost)
	{
		$this->setFirstName($dataFromPost["nom"]);
		$this->setLastName($dataFromPost["prenom"]);
		$this->setPseudo($dataFromPost["pseudo"]);
		$this->setMail($dataFromPost["email"]);
		$this->setPassword($dataFromPost["mdp"]);
		$this->setAddress($dataFromPost["adresse"]);
		$this->setNumero($dataFromPost["numero"]);
		$this->setStatut(0);
	}

	public function insertDb()
	{
		$query = "INSERT INTO user (`nom`,`prenom`,`pseudo`,`email`,`password`,`adresse`,`numero`,`statut`) VALUES (?,?,?,?,?,?,?,?)";

		$requetePreparee = self::getDb()->prepare($query);

		$reponse = $requetePreparee->execute([
			$this->getFirstName(),
			$this->getLastName(),
			$this->getPseudo(),
			$this->getMail(),
			$this->getPassword(),
			$this->getAddress(),
			$this->getNumero(),
			$this->getStatut()
		]);

		if (!$reponse)
		{
			$_SESSION["message"] = "Il y a eu une erreur lors de l'ajout en bdd<br>";
		}
	}
	public static function verifyData()
	{
		if(!empty($_POST)){ 
	
			if (!isset($_POST["nom"]) || empty($_POST["nom"]))
			{
				$_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
				Veuillez remplir le nom !
				</div>";
			
			}
		
			if (!isset($_POST["prenom"]) || empty($_POST["prenom"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir le prenom !
				</div>";
			
			}

			if (!isset($_POST["pseudo"]) || empty($_POST["pseudo"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir le pseudo !
				</div>";
			
			}

			if (!isset($_POST["email"]) || empty($_POST["email"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir votre email !
				</div>";
			
			}

			if (!isset($_POST["mdp"]) || empty($_POST["mdp"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir votre mot de passe !
				</div>";
			
			}

			if (!isset($_POST["numero"]) || empty($_POST["numero"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir votre numero !
				</div>";
			
			}
			if (!isset($_POST["adresse"]) || empty($_POST["adresse"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir votre adresse !
				</div>";
			
			}
		
	}
}

	public static function showDb()
	{	
		$query = "SELECT * FROM user LIMIT 100";

		$requetePreparee = self::getDb()->prepare($query);

		$reponse = $requetePreparee->execute();

		//verifie si la requete s'est bien déroulé
		if (!$reponse)
		{
			$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					Quelque chose ne s'est pas déroulé correctement pendant la requete
				</div>";
				return false;
		}
		
		if ($reponse)
		{
			$allUsers = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
		
		}

		return $allUsers;

	}
	
	public static function remove(){

	$requete = "DELETE FROM `user` WHERE `id_user` = ?";

	$requetePreparee = $bdd->prepare($requete);

	$reponse = $requetePreparee->execute([
		$_GET["id"]
		]);

	if (!$reponse)
	{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  La requete ne s'est pas déroulé correctement
		</div>";
		header("Location:" . __DIR__ . "profil");
		exit;
	}

	if ($requetePreparee->rowCount() == 0)
	{
		$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
			  L'utilisateur que vous essayez de supprimer, n'existe pas !
		</div>";
		header("Location:" . __DIR__ . "profil");
		exit;
	}

	if ($requetePreparee->rowCount() == 1)
	{
		$_SESSION["message"] .= "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
			  Vous avez bien supprimé l'utilisateur dont l'id est " . $_GET["id"] . "
		</div>";
		header("Location:" . URL . "user.php");
		exit;
	}
	}
	/**
	 * Get the value of id_user
	 */
	public function getIdUser()
	{
		return $this->id_user;
	}

	/**
	 * Set the value of id_user
	 */
	public function setIdUser($id_user): self
	{
		$this->id_user = $id_user;

		return $this;
	}

	/**
	 * Get the value of first_name
	 */
	public function getFirstName()
	{
		return $this->first_name;
	}

	/**
	 * Set the value of first_name
	 */
	public function setFirstName($first_name): self
	{
		$this->first_name = $first_name;

		return $this;
	}

	/**
	 * Get the value of last_name
	 */
	public function getLastName()
	{
		return $this->last_name;
	}

	/**
	 * Set the value of last_name
	 */
	public function setLastName($last_name): self
	{
		$this->last_name = $last_name;

		return $this;
	}

	/**
	 * Get the value of mail
	 */
	public function getMail()
	{
		return $this->mail;
	}

	/**
	 * Set the value of mail
	 */
	public function setMail($mail): self
	{
		$this->mail = $mail;

		return $this;
	}

	/**
	 * Get the value of password
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * Set the value of password
	 */
	public function setPassword($password): self
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Get the value of address
	 */
	public function getAddress()
	{
		return $this->address;
	}

	/**
	 * Set the value of address
	 */
	public function setAddress($address): self
	{
		$this->address = $address;

		return $this;
	}

	/**
	 * Get the value of numero
	 */
	public function getNumero()
	{
		return $this->numero;
	}

	/**
	 * Set the value of numero
	 */
	public function setNumero($numero): self
	{
		$this->numero = $numero;

		return $this;
	}

	/**
	 * Get the value of date_creation
	 */
	public function getDateCreation()
	{
		return $this->date_creation;
	}

	/**
	 * Set the value of date_creation
	 */
	public function setDateCreation($date_creation): self
	{
		$this->date_creation = $date_creation;

		return $this;
	}

	/**
	 * Get the value of statut
	 */
	public function getStatut()
	{
		return $this->statut;
	}

	/**
	 * Set the value of statut
	 */
	public function setStatut($statut): self
	{
		$this->statut = $statut;

		return $this;
	}

	/**
	 * Get the value of statut
	 */
	public function getPseudo()
	{
		return $this->pseudo;
	}

	/**
	 * Set the value of statut
	 */
	public function setPseudo($pseudo): self
	{
		$this->pseudo = $pseudo;

		return $this;
	}
}