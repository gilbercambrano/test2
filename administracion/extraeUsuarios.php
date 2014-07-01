<?php
	include_once("../library/ConexionExterna.php");

	$ce = new ConexionExterna();

	echo $ce->getJsonUsuariosAutocomplete($_GET['term']);

?>