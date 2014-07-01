<?php

	include_once("Database.php");

	class Propietario{

		private $id ;
		private $razon_social ;

		private $tabla ;
		private $conexion ;

		
		function __construct()
		{
			$ob = new Database();
			$this->conexion = $ob->getConexion();
			$this->tabla = "propietarios" ;
		}

		function insert( $propietario ){
			$sql = "insert into $this->tabla values(
				0,
				'".$propietario['razon_social']."'
				)";
			return $this->conexion->query($sql);
		}

		function getAll(){
			$sql = "select * from $this->tabla order by razon_social asc" ;
			$registros = array();
			$resultado = $this->conexion->query($sql);
			if($resultado->num_rows > 0){
				while ($row=$resultado->fetch_assoc()) {
					$registros[]=$row ;
				}
			}
			return $registros ;
		}

		function getId(){
			return $this->id ;
		}

		function getRazonSocial(){
			return $this->razon_social ;
		}

		function getConexion(){
			return $this->conexion ;
		}

		function closeConexion(){
			$this->conexion->close();
		}
	}

?>