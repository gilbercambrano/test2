<?php

	include_once("Database.php");

	class DetalleRenta{

		private $id ;
		private $fecha ;
		private $estatus ;
		private $descripcion ;
		private $renta ;
		private $importe ;
		private $renta_mensual ;

		private $tabla ;

		
		function __construct()
		{
			$ob = new Database();
			$this->conexion = $ob->getConexion();
			$this->tabla = "detalles_rentas" ;
		}

		function getId(){
			return $this->id ;
		}

		function getFecha(){
			return $this->fecha ;
		}

		function getEstatus(){
			return $this->estatus ;
		}

		function getDescripcion(){
			return $this->descripcion´;
		}

		function getImporte(){
			return $this->importe ;
		}

		function getRentaMensual(){
			return $this->renta_mensual ;
		}
	}

?>