<?php
 

    /* INCLUSION DE LIBRERIAS */

     include_once("../library/Componente.php");
     include_once("../library/Conductor.php");
     include_once("../library/ConexionExterna.php");
    

     $componente = new Componente();
     $conductor = new Conductor();
     $conexion_externa = new ConexionExterna();
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../img/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<link rel="stylesheet" href="../css/ui-lightness/jquery-ui.css" />
    <script src="../js/jquery-1.8.3.js"></script>
    <script src="../js/jquery-ui.js"></script>
    <script type="text/javascript">
      $(function(){

        $("#fecha_inicio_licencia").datepicker({
          changeYear: true,
          changeMonth: true,
          yearRange: "2012:2030",
          dateFormat:"yy-mm-dd",
          monthNamesShort:["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          dayNamesMin:["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"]
        });
        $("#fecha_fin_licencia").datepicker({
          changeYear: true,
          changeMonth: true,
          yearRange: "2012:2030",
          dateFormat:"yy-mm-dd",
          monthNamesShort:["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          dayNamesMin:["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"]
        });


         $("#nombre_usuario").autocomplete({
          minLength: 1,
          delay: 0,
          source: function(request, response) {
            $.ajax({
            url: "extraeUsuarios.php",
            dataType: "json",
            data: {
              term : request.term
             },

             success: function(data) {
                 response(data);
                  }
                  });
                  },
              select : function(event, ui){
            document.getElementById("usuario_chofer").value = ui.item.id ;
           
           
          }
             });

      });
    </script>
<title>.:Logística y Transporte SMT </title>
</head>

<body>
<div id="container">
    <div id="header">
          
          <div id="pemex"></div>
          <div id="usuario" >

            
            <table>
              <tr>
                <th width="380">Logística y Transporte SMT</th>
              </tr>
              <tr width="350">
                <td style="text-align:left; width:350px;">Bienvenido <?php echo "NOMBRE USUARIO"; ?></td>
                <td style="text-align:center;"><a title="Cerrar sesión" style="color:#FFFFFF;" href="../library/cerrar.php">Salir</a></td>
              </tr>
            </table>
          </div>
            <div id="smt"></div>

        </div> 
        
        <div id="menu">
          <?php
            echo $componente->getMainMenu();
            ?>
        </div>
        
        <div id="leftmenu">

        <div id="leftmenu_top"></div>

        <div id="leftmenu_main">    
                
               <?php
               echo $componente->getMenuCaptura();
               ?>
</div>
                
                
              <div id="leftmenu_bottom"></div>
        </div>
        
        
        
        
    <div id="content">
        
        
        <div id="content_top"></div>
        <div id="content_main">
            <!-- INICIO DE LA PARTE EDITABLE -->

            <div id="contenido" >


              <div id="title" >



              </div>

              <?php

              if(!empty($_GET) && $conductor->loadById($_GET['id_conductor']) ){
                $id = $conductor->getId() ;
                $usuario = $conductor->getUsuario() ;
                $licencia = $conductor->getLicencia() ;
                $fecha_inicio_licencia = $conductor->getFechaInicioLicencia() ;
                $fecha_fin_licencia = $conductor->getFechaFinLicencia() ;
                $comentarios = $conductor->getComentarios() ;
                $estatus = $conductor->getEstatus() ;
                $estatus_licencia = $conductor->getEstatusLicencia() ;
                $nombre_usuario = $conexion_externa->getNombreUsuario();
              }
              else{
                $id = '';
                $usuario  = '';
                $licencia  = '';
                $fecha_inicio_licencia  = '';
                $fecha_fin_licencia  = '';
                $comentarios  = '';
                $estatus  = 'ACTIVO';
                $estatus_licencia  = 'ACTIVO';
                $nombre_usuario = '' ;
              }

              ?>

              <div id="elementos" >

              <div id="formulario" >

                <form method="post" enctype="multipart/form-data">

                  <input type="hidden" name="id_conductor" value="<?php echo $id ; ?>" > 
                  <input type="hidden" name="usuario" value="<?php echo $usuario ; ?>" >
                  <input type="hidden" name="estatus" value="<?php echo $estatus ?>" >
                  <input type="hidden" name="estatus_licencia" value="<?php echo $estatus_licencia ?>" >

                  <table>
                    <tr>
                      <td>
                        Usuario:
                      </td>
                      <td>
                        <input type="text" name="nombre_usuario" id="nombre_usuario" value="<?php echo $nombre_usuario ; ?>" >
                        <input type="hidden" name="usuario" id="usuario_chofer" value="<?php echo $usuario; ?>" >
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Licencia:
                      </td>
                      <td>
                        <input type="hidden" name="MAX_FILE_SIZE" value="900000000" >
                        <input type="file" name="file_licencia"  >
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Fecha expedición licencia:
                      </td>
                      <td>
                        <input type="text" name="fecha_inicio_licencia" id="fecha_inicio_licencia" value="<?php echo $fecha_inicio_licencia; ?>" >
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Fecha expiración licencia:
                      </td>
                      <td>
                        <input type="text" name="fecha_fin_licencia" id="fecha_fin_licencia" value="<?php echo $fecha_fin_licencia; ?>" > 
                      </td>
                    </tr>
                    <tr>
                      <td>
                        Comentarios:
                      </td>
                      <td>
                        <textarea name="comentarios"> <?php echo $comentarios ; ?> </textarea>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="2" ><input value="Guardar Registro" type="submit" ></td>
                    </tr>

                  </table>


                </form>


                <?php

                  if(!empty($_POST)){
                    $_POST['licencia'] = $_POST['usuario'].'.pdf';
                  if( $cond = $conductor->insert($_POST) > 0){
                    $name = $_POST['usuario'].'.pdf';
                    copy($_FILES['file_licencia']['tmp_name'], '../files/licencias/'.$name) ;
                    ?>
                    <script type="text/javascript">
                      alert("Registro guardado con éxito");
                      window.location="usuario.php";
                    </script>
                    <?php
                  }
                  else {
                    ?>
                     <script type="text/javascript">
                        alert("Error al cargar registro");
                        window.location="usuario.php";
                      </script>
                    <?php
                  }
                }

                  ?>


              </div>

              <div id="tabla_captura" >



                <table border="1">
                  <tr>
                    <th>Usuario</th>
                    <th>Puesto</th>


                  </tr>
                 <?php

                 $array_usuarios = $conductor->loadAll();

                 foreach ($array_usuarios as $value) {
                  $conexion_externa->loadByIdEmpleado();
                   ?>
                   <tr>
                    <td>
                      <?php echo $value['nombre']; ?>
                    </td>
                    <td>
                      <?php echo $value['puesto']; ?>
                    </td>
                   </tr>
                   <?php
                 }

                 ?>
                </table>
              </div>

              </div>

            </div>

            <?php



            ?>

            <!-- FIN DE LA PARTE EDITABLE -->
        </div>
        <div id="content_bottom"></div>
            
        <div id="footer"> <!-- inicio footer -->
            <center>
            <?php
                echo $componente->getFooter(); 
            ?>
            </center>

        </div> <!-- fin footer -->

        </div> 
   </div>
</body>
</html>
