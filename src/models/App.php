<?php

class App
{
	//fonction utile
	public static function showArray(array $list) : void
	{
		echo "<pre>";
		print_r($list);
		echo "</pre>";
	}
//si on est connecte 
	public static function isconnect()
	{
	if (!empty($_SESSION['user'])) { // si cest pas vide ( donc connecté)
		return true;
	}else {
		return false; // si cest vide (non connecte)
	}
	}

	public static function isadmin()
	{
	if ($_SESSION['user']['statut']==1) {
		return true;
	}else {
		return false;
	}
	}

	public static function deconnexion()
	{
		session_destroy(); // supprimer la session
		header("Location:" . BASE_PATH . ""); // redirection page d'accueil
		
	}
	
}