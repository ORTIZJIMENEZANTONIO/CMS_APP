<?php

/**
 * 
 */
class conection{
	
	static public function conect(){
		$link = new PDO("mysql:host=localhost;dbname=db-blog",
		"root",
		"");
		$link->exec("set names utf8");
		return $link;
	}
}

 ?>