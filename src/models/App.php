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

	public static function isconnect()
	{
	if (!empty($_SESSION['user'])) {
		return true;
	}else {
		return false;
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
	
}