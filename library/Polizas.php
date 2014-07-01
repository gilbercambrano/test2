<?php

	include_once("Database.php");


	class Polizas{

		private $id ;
		private $numero_poliza ;
		private $fecha_inicio ;
		private $fecha_fin ;
		private $aseguradora ;
		private $comentarios ;
		private $estatus ;
		private $vehiculo ;
		private $importe ;
		private $poliza ;


		private $tabla ;

		
		function __construct()
		{
			$ob = new Database();
			$this->conexion = $ob->getConexion();
			$this->tabla = "polizas" ;
		}

		function getId(){
			return $this->id ;
		}

		function getNumeroPoliza(){
			return $this->numero_poliza ;
		}

		function getFechaInicio(){
			return $this->fecha_inicio ;
		}

		function getFechaFin(){
			return $this->fecha_fin ;
		}

		function getAseguradora(){
			return $this->aseguradora ;
		}

		function getComentarios(){
			return $this->comentarios ;
		}

		function getEstatus(){
			return $this->estatus ;
		}

		function getVehiculo(){
			return $this->vehiculo ;
		}

		function getImporte(){
			return $this->importe ;
		}

		function getPoliza(){
			return $this->poliza ;
		}
	}

?>