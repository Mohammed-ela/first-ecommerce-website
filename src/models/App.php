<?php

class App
{
	public static function showArray(array $list) : void
	{
		echo "<pre>";
		print_r($list);
		echo "</pre>";
	}
}