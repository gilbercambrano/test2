<?php
	
	include_once("Database.php");

	/**
	* 
	*/
	class Servicio
	{

		private $id ;
		private $tipo ;
		private $descripcion ;
		private $kilometraje_vehiculo ;
		private $fecha ;
		private $proxima_fecha ;
		private $proximo_kilometraje ;
		private $importe ;
		private $proveedor ;
		private $vehiculo ;
		private $factura ;


		private $tabla ;

		
		function __construct()
		{
			$ob = new Database();
			$this->conexion = $ob->getConexion();
			$this->tabla = "servicios" ;
		}


		function getId(){
			return $this->id ;
		}

		function getTipo(){
			return $this->tipo ;
		}

		function getDescripcion(){
			return $this->descripcion ;
		}

		function getKilometrajeVehiculo(){
			return $this->kilometraje_vehiculo ;
		}

		function getFecha(){
			return $this->fecha ;
		}

		function getProximaFecha(){
			return $this->proxima_fecha ;
		}

		function getProximoKilometraje(){
			return $this->proximo_kilometraje ;
		}

		function getImporte(){
			return $this->importe ;
		}

		function getProveedor(){
			return $this->proveedor ;
		}

		function getVehiculo(){
			return $this->vehiculo ;
		}

		function getFactura(){
			return $this->factura ;
		}


	}

?>