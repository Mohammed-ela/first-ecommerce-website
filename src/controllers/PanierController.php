<?php


class PanierController 
{
    
    public static function addcart_1($quantite = 1)
    {
        // Récupérer l'ID du produit depuis $_GET['id']
        $idProduit = $_GET['id'];
        
        
        // Vérifier si le produit est déjà dans le panier
        if (isset($_SESSION['panier'][$idProduit])) {
            // Le produit existe déjà dans le panier, mettre à jour la quantité
            $_SESSION['panier'][$idProduit] += $quantite;
        } else {
            // Le produit n'existe pas dans le panier, l'ajouter avec la quantité spécifiée
            $_SESSION['panier'][$idProduit] = $quantite;
        }
        
        // Rediriger l'utilisateur vers une autre page après l'ajout au $_SESSION['panier'];
        header("Location: " . BASE_PATH . "Produit?id={$_GET['cat']}");
        exit();
    }


    public static function show_panier()
    {

        $panier = new Panier();
        $panier->show_panier();
        include VIEWS . "panier/panier.php";
        exit();
    }
}