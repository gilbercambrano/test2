<?php

	include_once("Database.php");

	class RentaMensual{

		private $id ;
		private $mes ;
		private $anio ;
		private $fecha_pago ;
		private $estatus ;
		private $factura ;
		private $comentarios ;
		private $importe ;
		private $renta ;

		private $tabla ;

		
		function __construct()
		{
			$ob = new Database();
			$this->conexion = $ob->getConexion();
			$this->tabla = "rentas_mensuales" ;
		}

		function getId(){
			return $this->id ;
		}

		function getMes(){
			return $this->mes ;
		}

		function getAnio(){
			return $this->anio ;
		}

		function getFechaPago(){
			return $this->fecha_pago ;
		}

		function getEstatus(){
			return $this->estatus ;
		}

		function getFactura(){
			return $this->factura ;
		}

		function getComentarios(){
			return $this->comentarios ;
		}

		function getImporte(){
			return $this->importe ;
		}

		function getRenta(){
			return $this->renta ;
		}
		
	}

?>