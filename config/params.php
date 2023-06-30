<?php

/**
 * Fichier contenant la configuration de l'application
 */
const CONFIG = [
    'db' => [
        'DB_HOST' => 'localhost',
        'DB_PORT' => '3306',
        'DB_NAME' => 'projet',
        'DB_USER' => 'root',
        'DB_PSWD' => '', // root sur macOS
    ],
    'app' => [
        'name' => 'Projet-ws',
        'projectBaseUrl' => 'http://localhost/Projet-ws/'
    ]
];



/**
 * Constantes pour accéder rapidement aux dossiers importants du MVC
 */

 
const BASE_DIR = __DIR__ . '/../';
const BASE_PATH = CONFIG['app']['projectBaseUrl'] . 'public/index.php/';
const PUBLIC_FOLDER = BASE_DIR . 'public/';
const ASSETS = CONFIG['app']['projectBaseUrl']  . 'public/assets/';
const VIEWS = BASE_DIR . 'views/';
const TELECHARGEMENT = CONFIG['app']['projectBaseUrl']  . 'telechargement/';
const MODELS = BASE_DIR . 'src/models/';
const CONTROLLERS = BASE_DIR . 'src/controllers/';



/*
 * Liste des actions/méthodes possibles (les routes du routeur)
 */

$routes = [
                            //INDEX
    ''                  => ['AppController', 'index'],

                //CREATE READ UPDATE DELETE ===> CRUD
                            //USER
    '/inscription'      => ['UserController', 'register'],//j'appelle la methode registre() qui est dans le fichier UserController
    '/administration'      => ['UserController', 'showDb'],
    '/supprimer'      => ['UserController', 'remove'],
    '/modifier'      => ['UserController', 'modifier'],
    '/enregistrement'     => ['AppController', 'enregistrement'],
                            //CATEGORIES
    '/categorie'      => ['CategorieController', 'showDb'],
    '/enregistrement_cat'     => ['AppController', 'enregistrement_cat'],
    '/ajouter_cat'      => ['CategorieController', 'register'],
    '/supprimer_cat'      => ['CategorieController', 'remove'],
    '/modifier_cat'      => ['CategorieController', 'modifier'],

                            //PRODUIT
    '/produit'      =>      ['ProduitController', 'showDb'], // show list product
    '/ajouter_prd'      => ['ProduitController', 'register'], // add product
    '/supprimer_prd'      => ['ProduitController', 'remove'], // remove product
    '/modifier_prd'      => ['ProduitController', 'modifier'], // select
    '/enregistrement_prd'     => ['AppController', 'enregistrement_prd'], // update the select product


                            //LOGIN

    '/login'      => ['AppController', 'login'],
    '/connection'      => ['UserController', 'connection'],
    '/deconnexion'      => ['App', 'deconnexion'],
    '/mon-profil'       => ['UserController','my_profil'],
    '/my_profil_register' => ['UserController','my_profil_register'] ,
   

        //Affichage de mes categorie & produit en frontend

    '/Categorie'      => ['CategorieController', 'fetchAllCategorie'], // show all categories (3 for me)
    '/Produit'      => ['ProduitController', 'fetchAllProduct'], // show all product about 1 categorie
    '/Produit_info'      => ['ProduitController', 'fetchOneProduct'], // show information about 1 product

        //Gestion du panier
    '/panier'      => ['PanierController', 'addcart_1'],
    '/list_panier'      => ['PanierController', 'show_panier'],
    '/supprimer_panier'      => ['PanierController', 'delete_panier'],
    '/viderpanier'  => ['PanierController', 'vider_panier'],
        //Gestion du paiement
    '/paiement'      => ['App', 'paiement'],
    '/commande'      => ['UserController', 'commandes'],
    '/momo'      => ['test', 'commandes']


];