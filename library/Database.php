<?php
	class Database{

		private 	$servidor 	;
		private 	$usuario 	;
		private 	$password	;
		private 	$base_datos	;
		private 	$conexion	;

		function __construct(){
			$this->servidor 	= "localhost" 	;
			$this->usuario		= "root"		;
			$this->password 	= 'gilcamlop'	;
			$this->base_datos	= 'smt_vehiculos' ;

			$this->conexion 	= new mysqli( $this->servidor, $this->usuario, $this->password, $this->base_datos );  
			//mysql_query("SET NAMES 'utf8'");
			
		}

		function getConexion(){
			return $this->conexion ;
		}


	}
?>