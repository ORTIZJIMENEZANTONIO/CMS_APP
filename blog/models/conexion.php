<?php

/**
 * 
 */
class conection{
	
	static public function conect(){
		$link = new PDO("mysql:host=localhost;dbname=db-blog",
		"root",
		"");
		$link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$link->exec("set names utf8");
		return $link;
	}
}

 ?>