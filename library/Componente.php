<?php

	class Componente{

		public function __construct(){

		}

		public function getFooter(){
			return "<h3>
						
						
						<a href=\"http://www.pemex.com\">PEMEX</a>
						<a href=\"#\"> & </a>
						<a title=\"Servicios Marinos y Terrestres S. A. de C. V.\" href=\"http://www.sematesa.com\">SMT</a> 
						<br>
						<a href=#>Copyright © 2013</a>
						</h3>
						
					";
		}

		public function getMainMenu(){
			return "<ul>
            		<li class=\"menuitem\"><a href=\"../administracion\">Administración</a></li>
	                <li class=\"menuitem\"><a href=\"../usuarios\">Usuarios</a></li>
	                <li class=\"menuitem\"><a href=\"../estadisticas\">Estadísticas</a></li>
	                <li class=\"menuitem\"><a href=\"../mantenimiento\">Mantenimientos</a></li>
            	    </ul> " ;
		}

		public function getMenuCaptura(){
			return " <h3>Captura</h3>
					<ul>
                    <li><a href=\"index.php\">Vehiculos</a></li>
                    <li><a href=\"propietarios.php\">Propietarios</a></li>
                    <li><a href=\"asignacion.php\">Asignaciones</a></li>
                    <li><a href=\"usuario.php\">Conductores</a></li>
                   <!-- <li><a href=\"../estimaciones\">Estimaciones</a></li> -->
                    
                    </ul>" ;
		}

		public function getMenuImpresiones(){
			return " <h3>Impresiones</h3>
					<ul>
                    <li><a href=\"../imprimir/\">Generador Aprobado</a></li>
                    <li><a href=\"../imprimir_reporte\">Reportes Aprobados</a></li>
                    <li><a href=\"../imprimir_local/\">Generador Local</a></li>
                    <li><a href=\"../imprimir_reporte_local/\">Reportes Locales</a></li>
                    </ul>" ;
		}

		public function getMenuRevisiones(){
			return " <h3>Captura</h3>
					<ul>
                    <li><a href=\"index.php\">Actividades</a></li>
                    <li><a href=\"pendientes.php\">Pendientes</a></li>
                    </ul>" ;
		}

		public function getMenuAdministracion(){
			return " <h3>Administración</h3>
					<ul>
					<li><a href=\"numero_estimacion.php\">Números Estimaciones</a></li>
                    <li><a href=\"usuario.php\">Usuarios</a></li>
                    <li><a href=\"sector.php\">Sectores</a></li>
                    <li><a href=\"ordenes.php\">Órdenes</a></li>
                    
                    </ul>" ;
		}


	}

?>
