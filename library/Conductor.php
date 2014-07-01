<?php

	include_once("Database.php");

	class Conductor{

		private $id ;
		private $usuario ;
		private $licencia ;
		private $fecha_inicio_licencia ;
		private $fecha_fin_licencia ;
		private $comentarios ;
		private $estatus ;
		private $estatus_licencia ;

		private $tabla ;

		
		function __construct()
		{
			$ob = new Database();
			$this->conexion = $ob->getConexion();
			$this->tabla = "conductores" ;
		}

		function insert($registro){
			$sql = "insert into $this->tabla values(
				0, 
				".$registro['usuario'].",
				'".$registro['licencia']."',
				'".$registro['fecha_inicio_licencia']."',
				'".$registro['fecha_fin_licencia']."',
				'".$registro['comentarios']."',
				'".$registro['estatus']."',
				'".$registro['estatus_licencia']."'
				)";
			$this->conexion->query($sql);
			return $this->conexion->insert_id ;
		}

		function getId(){
			return $this->id ;
		}

		function getUsuario(){
			return $this->usuario ;
		}

		function getLicencia(){
			return $this->licencia ;
		}

		function getFechaIncioLicencia(){
			return $this->fecha_inicio_licencia ;
		}

		function getFechaFinLicencia(){
			return $this->fecha_fin_licencia ;
		}

		function getComentarios(){
			return $this->comentarios ;
		}

		function getEstatus(){
			return $this->estatus ;
		}

		function getEstatusLicencia(){
			return $this->estatus_licencia ;
		}
	}

?>