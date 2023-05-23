<?php

class Produit extends Db
{
	private $id_produit; //
	private $titre;
	private $description;
	private $couleur;
    private $autonomie;
    private $photo;
    private $avis;
    private $prix;
    private $date_creation; //
    private $categorie_id; //
    
	public function createFromPost(array $dataFromPost)
	{
		$this->setTitre($dataFromPost["titre"]);
		$this->setDescription($dataFromPost["description"]);
		$this->setCouleur($dataFromPost["couleur"]);
        $this->setAutonomie($dataFromPost["autonomie"]);
        $this->setPhoto($dataFromPost["photo"]);
        $this->setAvis($dataFromPost["avis"]);
        $this->setPrix($dataFromPost["prix"]);  
	}

	public function insertDb()
	{
		$query = "INSERT INTO montre (`titre`, `description`, `couleur`, `autonomie`, `photo`, `avis`, `prix`) VALUES (?,?,?,?,?,?,?)";
        
		$requetePreparee = self::getDb()->prepare($query);

		$reponse = $requetePreparee->execute([
			$this->getTitre(),
			$this->getDescription(),
			$this->getCouleur(),
            $this->getAutonomie(),
            $this->getPhoto(),
            $this->getAvis(),
            $this->getPrix()
			]);
          
           
		if (!$reponse)
		{
			$_SESSION["message"] = "Il y a eu une erreur lors de l'ajout en bdd<br>";
		}
	}
	public static function verifyData()
	{
		if(!empty($_POST)){ 
	
			if (!isset($_POST["titre"]) || empty($_POST["titre"]))
			{
				$_SESSION["message"] = "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
				Veuillez remplir le titre  du produit !
				</div>";
			
			}
		
			if (!isset($_POST["photo"]) || empty($_POST["photo"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir le chemin de l'image du produit !
				</div>";
			
			}

			if (!isset($_POST["description"]) || empty($_POST["description"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir la descrption du produit !
				</div>";
			
			}

            if (!isset($_POST["couleur"]) || empty($_POST["couleur"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez choisir la couleur du produit !
				</div>";
			
			}

            if (!isset($_POST["autonomie"]) || empty($_POST["autonomie"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir l'autonomie du produit !
				</div>";
			
			}

            if (!isset($_POST["avis"]) || empty($_POST["avis"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez remplir l'avis sur le produit !
				</div>";
			
			}

            if (!isset($_POST["prix"]) || empty($_POST["prix"]))
			{
				$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					  Veuillez entrer le prix du produit !
				</div>";
			
			}

			
		
	}
}

	public static function showDb()
	{	
		$query = "SELECT * FROM montre  LIMIT 100";

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

		$query = "DELETE FROM `montre` WHERE id_montre = ?";

		$requetePreparee = self::getDb()->prepare($query);

		$reponse = $requetePreparee->execute([$_GET["id"]]);
	
		if (!$reponse)
		{
			$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
				  La requete ne s'est pas déroulé correctement
			</div>";
			header("Location:" . BASE_PATH . "produit");
			exit;
		}
	
		if ($requetePreparee->rowCount() == 0)
		{
			$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
				  Le produit que vous essayez de supprimer, n'existe pas !
			</div>";
			header("Location:" . BASE_PATH . "produit");
			exit;
		}
	
		if ($requetePreparee->rowCount() == 1)
		{
			$_SESSION["message"] .= "<div class=\"alert alert-success w-50 mx-auto\" role=\"alert\">
				  Vous avez bien supprimé le produit dont l'id est " . $_GET["id"] . "
			</div>";
			header("Location:" . BASE_PATH . "produit");
			exit;
		}
	
	}

	public static function modifier(){

		$query = "SELECT `id_montre`, `titre`, `description`, `couleur`, `autonomie`, `photo`, `avis`, `prix` FROM `montre` WHERE `id_montre` = ?";

		$requetePreparee = self::getDb()->prepare($query);

		$reponse = $requetePreparee->execute([

		$_GET["id"]

		]);

		$userFromBdd = $requetePreparee->fetch(PDO::FETCH_ASSOC);
		return $userFromBdd;

	}


	/**
	 * Get the value of id_produit
	 */ 
	public function getId_produit()
	{
		return $this->id_produit;
	}

	/**
	 * Set the value of id_produit
	 *
	 * @return  self
	 */ 
	public function setId_produit($id_produit)
	{
		$this->id_produit = $id_produit;

		return $this;
	}

	/**
	 * Get the value of titre
	 */ 
	public function getTitre()
	{
		return $this->titre;
	}

	/**
	 * Set the value of titre
	 *
	 * @return  self
	 */ 
	public function setTitre($titre)
	{
		$this->titre = $titre;

		return $this;
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
	 * Get the value of couleur
	 */ 
	public function getCouleur()
	{
		return $this->couleur;
	}

	/**
	 * Set the value of couleur
	 *
	 * @return  self
	 */ 
	public function setCouleur($couleur)
	{
		$this->couleur = $couleur;

		return $this;
	}

    /**
     * Get the value of autonomie
     */ 
    public function getAutonomie()
    {
        return $this->autonomie;
    }

    /**
     * Set the value of autonomie
     *
     * @return  self
     */ 
    public function setAutonomie($autonomie)
    {
        $this->autonomie = $autonomie;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of avis
     */ 
    public function getAvis()
    {
        return $this->avis;
    }

    /**
     * Set the value of avis
     *
     * @return  self
     */ 
    public function setAvis($avis)
    {
        $this->avis = $avis;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of date_creation
     */ 
    public function getDate_creation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of date_creation
     *
     * @return  self
     */ 
    public function setDate_creation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

    /**
     * Get the value of categorie_id
     */ 
    public function getCategorie_id()
    {
        return $this->categorie_id;
    }

    /**
     * Set the value of categorie_id
     *
     * @return  self
     */ 
    public function setCategorie_id($categorie_id)
    {
        $this->categorie_id = $categorie_id;

        return $this;
    }
}