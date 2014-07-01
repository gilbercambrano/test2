<?php

	include_once("Database.php");

	class Vehiculo{

		private $id ;
		private $serie ;
		private $placa ;
		private $modelo ;
		private $marca ;
		private $anio ;
		private $numero_economico ;
		private $color ;
		private $capacidad ;
		private $tipo_combustible ;
		private $rendimiento_combustible ;
		private $comentarios ;
		private $propietario ;
		private $estatus ;
		private $tarjeta_circulacion ;
		private $anio_tarjeta_circulacion ;

		private $tabla ;

		
		function __construct()
		{
			$ob = new Database();
			$this->conexion = $ob->getConexion();
			$this->tabla = "vehiculos" ;
		}

		function insert( $propietario ){
			$sql = "insert into $this->tabla values(
				0,
				'".$propietario['serie']."',
				'".$propietario['placa']."',
				'".$propietario['modelo']."',
				'".$propietario['marca']."',
				".$propietario['anio'].",
				'".$propietario['numero_economico']."',
				'".$propietario['color']."',
				'".$propietario['capacidad']."',
				'".$propietario['tipo_combustible']."',
				'".$propietario['rendimiento_combustible']."',
				'".$propietario['comentarios']."',
				".$propietario['id_propietario'].",
				'".$propietario['estatus']."',
				'".$propietario['tarjeta_circulacion']."',
				".$propietario['anio_tarjeta_circulacion']."
				)";
			$this->conexion->query($sql);
			return $this->conexion->insert_id ;
		}

		function getId(){
			return $this->id ;
		}

		function getSerie(){
			return $this->serie ;
		}

		function getPlaca(){
			return $this->placa ;
		}

		function getModelo(){
			return $this->modelo ;
		}

		function getMarca(){
			return $this->marca ;
		}

		function getAnio(){
			return $this->anio ;
		}

		function getNumeroEconomico(){
			return $this->numero_economico ;
		}

		function getColor(){
			return $this->color ;
		}

		function getCapacidad(){
			return $this->capacidad ;
		}

		function getTipoCombustible(){
			return $this->tipo_combustible ;
		}

		function getRendimientoCombustible(){
			return $this->rendimiento_combustible ;
		}

		function getComentarios(){
			return $this->comentarios ;
		}

		function getPropietario(){
			return $this->propietario ;
		}

		function getEstatus(){
			return $this->estatus ;
		}

		function getTarjetaCirculacion(){
			return $this->tarjeta_circulacion ;
		}

		function getAnioTarjetaCirculacion(){
			return $this->anio_tarjeta_circulacion ;
		}		

	}

?>