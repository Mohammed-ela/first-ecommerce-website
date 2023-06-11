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
        
    
        // Récupération des identifiants des produits dans le panier
        // $idsProduits = array_keys($panier);
    
        // Requête pour récupérer les titres des montres correspondant aux identifiants
        $query = "SELECT `id_montre`, `titre` FROM montre";
        $requetePreparee = self::getDb()->prepare($query);
        $reponse = $requetePreparee->execute();
    
        if (!$reponse) {
            $_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
                Quelque chose ne s'est pas déroulé correctement pendant la requete
            </div>";
            return false;
        }else {
            $montres = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
        }
    
        return $montres;
      }    
      

}