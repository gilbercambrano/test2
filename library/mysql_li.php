<?php

	include("Database.php");

	$obj = new Database ;


	$c = $obj->getConexion();

	var_dump($c->query("show fields from vehiculos"));



?>