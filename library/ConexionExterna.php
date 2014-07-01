<?php
	class ConexionExterna{

		private 	$servidor 	;
		private 	$usuario 	;
		private 	$password	;
		private 	$base_datos	;
		private 	$conexion	;

		function __construct(){
			$this->servidor 	= "localhost" 	;
			$this->usuario		= "root"		;
			$this->password 	= 'gilcamlop'	;
			$this->base_datos	= 'smt_database' ;

			$this->conexion 	= new mysqli( $this->servidor, $this->usuario, $this->password, $this->base_datos );  
			
			//mysql_query("SET NAMES 'utf8'");
			//mysql_select_db($this->base_datos) ;
		}


		function getJsonUsuariosAutocomplete($input){
			$sql = "select 
							e.id_empleado as id, 
							concat(e.nombre, ' ', e.apellido_paterno, ' ', e.apellido_materno) as nombre_empleado, 
							p.nombre as puesto 
							from empleados as e
							join empleados_puestos as ep
								on ep.id_empleado = e.id_empleado
							join puestos as p
								on p.id_puesto = ep.id_puesto
							where 
								e.estatus ='LABORANDO' and
								concat(e.nombre, ' ', e.apellido_paterno, ' ', e.apellido_materno) like '%".$input."%' 
							order by e.nombre
							limit 10
							" ;
			$array_usuarios = array() ;
			$resultado = $this->conexion->query($sql);
			if( $resultado->num_rows >0 ){
				while($row=$resultado->fetch_assoc()){
					$array_usuarios [] =array(
						"id" => $row['id'],
						"value"=>$row['nombre_empleado'] . "  -  " . $row['puesto'],
						"label"=>$row['nombre_empleado'] . "  -  " . $row['puesto']
						);
				}
			}

			return json_encode($array_usuarios, true );
		}



	}
?>