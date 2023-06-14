<?php

class Panier extends Db
{
    public function __construct()
    {
        // Vérifier si le panier existe déjà dans la session, sinon le créer
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
        }
    }
    
    
    public static function show_panier()
    {
        
        
        $query = "SELECT * FROM `montre`";

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
			$montre = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
		
		}
    
		return $montre;

      

}
}