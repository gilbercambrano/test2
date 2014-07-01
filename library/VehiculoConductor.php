<?php

	include_once("Database.php");

	class VehiculoConductor{

		private $id ;
		private $vehiculo ;
		private $conductor ;
		private $fecha_inicio ;
		private $fecha_fin ;
		private $comentarios ;
		private $estatus ;

		private $tabla ;

		
		function __construct()
		{
			$ob = new Database();
			$this->conexion = $ob->getConexion();
			$this->tabla = "vehiculos_conductores" ;
		}

		function getId(){
			return $this->id ;
		}

		function getVehiculo(){
			return $this->vehiculo ;
		}

		function getConductor(){
			return $this->conductor ;
		}

		function getFechaInicio(){
			return $this->fecha_inicio ;
		}

		function getFechaFin(){
			return $this->fecha_fin ;
		}

		function getComentarios(){
			return $this->comentarios ;
		}

		function getEstatus(){
			return $this->estatus ;
		}
	}

?>