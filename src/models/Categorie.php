<?php

class Categorie extends Db
{
	private $id_categorie;
	private $name;
	private $description;
	private $picture;
	public function createFromPost(array $dataFromPost)
	{
		$this->setName($dataFromPost["name"]);
		$this->setDescription($dataFromPost["description"]);
		$this->setPicture($dataFromPost["picture"]);
	}

	public function insertDb()
	{
		$query = "INSERT INTO categorie (`name`, `description`, `picture`) VALUES (?,?,?)";

		$requetePreparee = self::getDb()->prepare($query);

		$reponse = $requetePreparee->execute([
			$this->getName(),
			$this->getDescription(),
			$this->getPicture()
			]);

		if (!$reponse)
		{
			$_SESSION["message"] = "Il y a eu une erreur lors de l'ajout en bdd<br>";
		}
	}
	public static function verifyData()
	{
		if(!empty($_POST)){ 
	
			if (!isset($_POST["name"]) || empty($_POST["name"]))
			{
				$_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
				Veuillez remplir le nom  de la categorie!
				</div>";
			
			}
		
			if (!isset($_POST["picture"]) || empty($_POST["picture"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir le chemin de l'image de la categorie !
				</div>";
			
			}

			if (!isset($_POST["description"]) || empty($_POST["description"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir la descrption de la categorie !
				</div>";
			
			}

			
		
	}
}

	public static function showDb()
	{	
		$query = "SELECT * FROM categorie  LIMIT 100";

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
			$allcategorie = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
		
		}

		return $allcategorie;

	}
	
	public static function remove(){

		$query = "DELETE FROM `categorie` WHERE id_categorie = ?";

		$requetePreparee = self::getDb()->prepare($query);

		$reponse = $requetePreparee->execute([$_GET["id"]]);
	
		if (!$reponse)
		{
			$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
				  La requete ne s'est pas déroulé correctement
			</div>";
			header("Location:" . BASE_PATH . "categorie");
			exit;
		}
	
		if ($requetePreparee->rowCount() == 0)
		{
			$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
				  L'utilisateur que vous essayez de supprimer, n'existe pas !
			</div>";
			header("Location:" . BASE_PATH . "categorie");
			exit;
		}
	
		if ($requetePreparee->rowCount() == 1)
		{
			$_SESSION["message"] .= "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
				  Vous avez bien supprimé l'utilisateur dont l'id est " . $_GET["id"] . "
			</div>";
			header("Location:" . BASE_PATH . "categorie");
			exit;
		}
	
	}

	public static function modifier(){

		$query = "SELECT `id_categorie`, `name`, `description`, `picture` FROM `categorie` WHERE `id_categorie` = ?";

		$requetePreparee = self::getDb()->prepare($query);

		$reponse = $requetePreparee->execute([

		$_GET["id"]

		]);

		$userFromBdd = $requetePreparee->fetch(PDO::FETCH_ASSOC);
		return $userFromBdd;

	}


	/**
	 * Get the value of description
	 */ 
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * Set the value of description
	 *
	 * @return  self
	 */ 
	public function setDescription($description)
	{
		$this->description = $description;

		return $this;
	}

	/**
	 * Get the value of picture
	 */ 
	public function getPicture()
	{
		return $this->picture;
	}

	/**
	 * Set the value of picture
	 *
	 * @return  self
	 */ 
	public function setPicture($picture)
	{
		$this->picture = $picture;

		return $this;
	}

	/**
	 * Get the value of name
	 */ 
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Set the value of name
	 *
	 * @return  self
	 */ 
	public function setName($name)
	{
		$this->name = $name;

		return $this;
	}

	/**
	 * Get the value of id_categorie
	 */ 
	public function getId_categorie()
	{
		return $this->id_categorie;
	}

	/**
	 * Set the value of id_categorie
	 *
	 * @return  self
	 */ 
	public function setId_categorie($id_categorie)
	{
		$this->id_categorie = $id_categorie;

		return $this;
	}
}