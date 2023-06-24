<?php  
$title = "Mon profil";
include VIEWS.'inc/header.php'; 
if (!App::isconnect()) {
$_SESSION["message"] .= "<div class=\"alert alert-danger w-50 mx-auto\" role=\"alert\">
					Vous devez d'abord vous connectez pour voir vos commandes
				</div>";
header("Location:" . BASE_PATH . "connection");
exit();
}
if (!empty($_SESSION['user']['id_user'])) {
$achats = User::commandes();
}
$allmontre = Panier::show_panier();


?>
<style>


</style>

			<h1 class="title-h1-nopad"> Bienvenue dans l'historique de vos commande</h1>
			<section class="commandes">
<?php 
if (!empty($_SESSION['user']['id_user'])) {
    $table = '<table class="table-commandes responsive">';
    $table .= "\n\t<thead>\n\t\t<tr class='title-tr'>\n\t\t\t<th>Produit</th>\n\t\t\t<th>Quantité</th>\n\t\t\t<th>Couleur</th>\n\t\t\t<th>Prix</th>\n\t\t\t<th style='text-align: end;'>Montant Total</th>\n\t\t</tr>\n\t</thead>";
    $table .= "\n\t<tbody>";
    
    $currentDate = null;
    $currentHour = null;
    $totalCommande = 0; // Variable pour stocker le montant total de chaque commande
    
    foreach ($achats as $achat) {
        $date = date('d-m-Y', strtotime($achat['date_achat']));
        $heure = date('H:i:s', strtotime($achat['date_achat']));
        
        if ($date != $currentDate) {
            // Nouvelle date, créez une nouvelle ligne avec la date
            $table .= "\n\t\t<tr class='commande-date'>\n\t\t\t<td colspan='6'><h1 class='h1-in-tab'>Mes commandes du " . $date . "</h1></td>\n\t\t</tr>";
    
            $currentDate = $date;
            $currentHour = null; // Réinitialise l'heure pour la nouvelle date
        }
    
        if ($heure != $currentHour) {
            // Nouvelle heure, créez une nouvelle ligne avec l'heure
            if ($currentHour != null) {
                // Afficher le montant total de la commande précédente
                $table .= "\n\t\t<tr class='montant-total'>\n\t\t\t<td colspan='4'></td>\n\t\t\t<td>Total : " . $totalCommande . " €</td>\n\t\t</tr>";
            }
    
            $table .= "\n\t\t<tr class='commande-heure'>\n\t\t\t<td colspan='6'><h3>Votre commandes passées à " . $heure . "</h3></td>\n\t\t</tr>";
    
            $currentHour = $heure;
            $totalCommande = 0; // Réinitialise le montant total pour la nouvelle commande
        }
    
        foreach ($allmontre as $montre) {
            if ($montre['id_montre'] == $achat['montre_id']) {
                $id = $achat['montre_id'];
                $titre = $montre['titre'];
                $couleur = $montre['couleur'];
                $image = $montre['photo'];
                $prix = $montre['prix'];
                break;
            }
        }
    
        $montantTotalLigne = $achat['quantite'] * $prix; // Calcul du montant total pour la ligne de commande actuelle
        $totalCommande += $montantTotalLigne; // Ajout du montant total de la ligne de commande au montant total de la commande en cours
    
        $table .= "\n\t\t<tr class='article-cmd'>";
        $table .= "\n\t\t\t<td><a href='Produit_info?id=" . $id . "'>" . $titre . "<img src='" . TELECHARGEMENT . "produit/" . $image . "' alt='" . $titre . "' width='35' height='35'></a></td>";
        $table .= "\n\t\t\t<td>" . $achat['quantite'] . "</td>";
        $table .= "\n\t\t\t<td>" . $couleur . "</td>";
        $table .= "\n\t\t\t<td>" . $prix . " €</td>";
        $table .= "\n\t\t\t<td></td>"; // Colonne vide pour le montant total de la ligne de commande (non affiché)
        $table .= "\n\t\t</tr>";
    }
    
    // Afficher le montant total de la dernière commande
    if ($currentHour != null) {
        $table .= "\n\t\t<tr class='montant-total'>\n\t\t\t<td colspan='4'></td>\n\t\t\t<td>Total : " . $totalCommande . " €</td>\n\t\t</tr>";
    }
    
    $table .= "\n\t</tbody>\n</table>";
    
    echo $table;
}
?>
</section>






<?php 
include VIEWS.'inc/footer.php'; 
?>