<?php

	include_once("Database.php");

	class Siniestro{

		private $id ;
		private $fecha ;
		private $descripcion ;
		private $deducible ;
		private $descripcion_pago ;
		private $foto_1 ;
		private $foto_2 ;
		private $estatus ;
		private $vehiculo ;

		private $tabla ;

		
		function __construct()
		{
			$ob = new Database();
			$this->conexion = $ob->getConexion();
			$this->tabla = "siniestros" ;
		}

		function getId(){
			return $this->id ;
		}

		function getFecha(){
			return $this->fecha ;
		}

		function getDescripcion(){
			return $this->descripcion ;
		}

		function getDeducible(){
			return $this->deducible ;
		}

		function getDescripcionPago(){
			return $this->descripcion_pago ;
		}

		function getFoto1(){
			return $this->foto_1 ;
		}

		function getFoto2(){
			return $this->foto_2 ;
		}

		function getEstatus(){
			return $this->estatus ;
		}

		function getVehiculo(){
			return $this->vehiculo ;
		}
	}

?>