<?php

	include_once("Database.php");

	class Renta{

		private $id ;
		private $importe_diario ;
		private $estatus ;
		private $fecha_inicio ;
		private $fecha_fin ;
		private $comentarios ;
		private $vehiculo ;
		private $contrato ;

		private $tabla ;

		
		function __construct()
		{
			$ob = new Database();
			$this->conexion = $ob->getConexion();
			$this->tabla = "rentas" ;
		}

		function getId(){
			return $this->id ;
		}

		function getImporteDiario(){
			return $this->importe_diario ;
		}

		function getEstatus(){
			return $this->estatus ;
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

		function getVehiculo(){
			return $this->vehiculo ;
		}

		function getContrato(){
			return $this->contrato ;
		}

	}

?>