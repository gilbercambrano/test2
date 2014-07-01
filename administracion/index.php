<?php
 

    /* INCLUSION DE LIBRERIAS */

     include_once("../library/Componente.php");
     include_once("../library/Propietario.php");
     include_once("../library/Vehiculo.php");
    

     $componente = new Componente();
     $propietario = new Propietario();
     $vehiculo = new Vehiculo();
    
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

        $("#fecha").datepicker({
          changeYear: true,
          changeMonth: true,
          yearRange: "2012:2030",
          dateFormat:"yy-mm-dd",
          monthNamesShort:["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
          dayNamesMin:["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"]
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



              <div id="elementos" >

              <div id="formulario" >

                  <form method="post" enctype="multipart/form-data">

                    <?php
                      if(!empty($_GET) && $vehiculo->loadById() ){

                        $serie = $vehiculo->getSerie();
                        $id = $vehiculo->getId();
                        $placa = $vehiculo->getPlaca();
                        $modelo = $vehiculo->getModelo();
                        $marca = $vehiculo->getMarca();
                        $anio = $vehiculo->getAnio();
                        $numero_economico = $vehiculo->getNumeroEconomico();
                        $color = $vehiculo->getColor();
                        $capacidad = $vehiculo->getCapacidad();
                        $tipo_combustible = $vehiculo->getTipoCombustible();
                        $rendimiento_combustible = $vehiculo->getRendimientoCombustible();
                        $comentarios = $vehiculo->getComentarios();
                        $id_propietario = $vehiculo->getPropietario();
                        $estatus = $vehiculo->getEstatus();
                        $tarjeta_circulacion = $vehiculo->getTarjetaCirculacion();
                        $anio_tarjeta_circulacion = $vehiculo->getAnioTarjetaCirculacion();
                      }
                      else{
                        $serie = '' ;
                        $id = '' ;
                        $placa = '' ;
                        $modelo = -1 ;
                        $marca = -1 ;
                        $anio = '' ;
                        $numero_economico = '' ;
                        $color = -1 ;
                        $capacidad = '' ;
                        $tipo_combustible = -1 ;
                        $rendimiento_combustible = '' ;
                        $comentarios = '' ;
                        $id_propietario = -1 ;
                        $estatus = 'ACTIVO' ;
                        $tarjeta_circulacion = '' ;
                        $anio_tarjeta_circulacion = '' ;
                      }
                    ?>
                    <input type="hidden" name="id_vehiculo" value="<?php echo $id ; ?>">
                    <input type="hidden" name="estatus" value="<?php echo $estatus ; ?>" > 
                    <table>
                      <tr>
                        <td>
                          No. de serie:
                        </td>
                        <td>
                          <input type="text" name="serie" value="<?php echo $serie; ?>" required >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Placa:
                        </td>
                        <td>
                          <input type="text" name="placa" value="<?php echo $placa; ?>" required>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Modelo:
                        </td>
                        <td>
                          <?php
                          $v = array();
                          $v[]= 'ATTITUDE';
                          $v[]= 'AUTOBUS';
                          $v[]= 'CAMION';
                          $v[]= 'CHASIS C-3500';
                          $v[]= 'DAKOTA';
                          $v[]= 'ESTAQUITAS';
                          $v[]= 'F-150';
                          $v[]= 'H-100';
                          $v[]= 'HIACE';
                          $v[]= 'HILUX';
                          $v[]= 'JOURNEY';
                          $v[]= 'PLANA 60 TON.';
                          $v[]= 'PLATAFORMA 30 TON.';
                          $v[]= 'PLATAFORMA 600 KG. ';
                          $v[]= 'RAM 1500';
                          $v[]= 'RAM 2500 4X4';
                          $v[]= 'RAM 4000';
                          $v[]= 'RANGER';
                          $v[]= 'SILVERADO';
                          $v[]= 'TRACTO HIAB CON GRUA';
                          $v[]= 'TRACTOCAMION';
                          $v[]= 'TRACTOCAMION CON GRUA';
                          $v[]= 'TRANSIT';
                          $v[]= 'TSURU';

                          sort($v) ;

                          ?>
                          <select name="modelo" >
                            <option value="-1" <?php echo ($modelo==-1) ? "selected='selected'" : '' ?> >Seleccione modelo</option>
                            <?php 
                              foreach ($v as $value) {
                              ?>
                              <option value="<?php echo $value ; ?>" <?php echo ($modelo==$value) ? "selected='selected'" : '' ?> ><?php echo $value ; ?></option>
                              <?php    
                              }
                            ?>
                            
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Marca:
                        </td>
                        <td>
                          <?php
                            $m = array();
                            $m[]='DOGGE';
                            $m[]='FORD';
                            $m[]='CHEVROLET';
                            $m[]='NISSAN';
                            $m[]='NO APLICA';
                            $m[]='TOYOTA';
                            $m[]='CHRYSLER';
                            $m[]='MERCEDES BENZ';
                            $m[]='ADJ';

                            sort($m);

                          ?>
                          <select name="marca" >
                            <option value="-1" <?php echo ($marca==-1) ? "selected='selected'" : '' ?> >Seleccione marca</option>
                            <?php 
                              foreach ($m as $value) {
                              ?>
                              <option value="<?php echo $value ; ?>" <?php echo ($marca==$value) ? "selected='selected'" : '' ?> ><?php echo $value ; ?></option>
                              <?php    
                              }
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Anio:
                        </td>
                        <td>
                          <input type="text" name="anio" value="<?php echo $anio; ?>" required >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Número económico:
                        </td>
                        <td>
                          <input type="text" name="numero_economico" value="<?php echo $numero_economico; ?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Color:
                        </td>
                        <td>
                          <?php
                          $c=array();
                          $c[]='ROJO';
                          $c[]='BLANCO';
                          $c[]='GRIS';
                          $c[]='VERDE';
                          $c[]='AZUL';
                          $c[]='NO APLICA';
                          $c[]='PLATA';
                          $c[]='HEGRO';
                          $c[]='DORADO';

                          sort($c);

                          ?>
                          <select name="color" >
                            <option value="-1" <?php echo ($color==-1) ? "selected='selected'" : '' ?> >Seleccione color</option>
                            <?php 
                              foreach ($c as $value) {
                              ?>
                              <option value="<?php echo $value ; ?>" <?php echo ($color==$value) ? "selected='selected'" : '' ?> ><?php echo $value ; ?></option>
                              <?php    
                              }
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Capacidad:
                        </td>
                        <td>
                          <input type="text" name="capacidad" value="<?php echo $capacidad; ?>" >
                        </td>
                      </tr>
                       <tr>
                        <td>
                          Tipo de combustible:
                        </td>
                        <td>
                          <?php
                          $t=array();
                          $t[]='GASOLINA';
                          $t[]='DIESEL';
                          
                          sort($t);

                          ?>
                          <select name="tipo_combustible" >
                            <option value="-1" <?php echo ($tipo_combustible==-1) ? "selected='selected'" : '' ?> >Seleccione tipo combustible</option>
                            <?php 
                              foreach ($t as $value) {
                              ?>
                              <option value="<?php echo $value ; ?>" <?php echo ($tipo_combustible==$value) ? "selected='selected'" : '' ?> ><?php echo $value ; ?></option>
                              <?php    
                              }
                            ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Rendimiento combustible:
                        </td>
                        <td>
                          <input type="text" name="rendimiento_combustible" value="<?php echo $rendimiento_combustible; ?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Arrendadora:
                        </td>
                        <td>
                          <select name="id_propietario" >
                            <option value="-1" <?php echo ($id_propietario==-1) ? "selected='selected'" : '' ?> >Seleccione arrendadora</option>
                          <?php
                          $array_propietarios = $propietario->getAll();
                          if(!empty($array_propietarios)){
                            foreach ($array_propietarios as $value) {
                              ?>
                              <option value="<?php echo $value['id_propietario'] ; ?>" <?php echo ($id_propietario==$value['id_propietario']) ? "selected='selected'" : '' ?> ><?php echo $value['razon_social'] ; ?></option>
                              <?php 
                            }
                          }
                          else{
                            ?>
                            <script type="text/javascript">
                            alert("Favor de agregar arrendadora.");
                            window.location="propietarios.php";
                            </script>
                            <?php
                          }
                          ?>
                          </select>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Tarjeta de circulación:
                        </td>
                        <td>
                          <input type="hidden" name="MAX_FILE_SIZE" value="900000000" >
                          <input type="file" name="tarjeta_circulacion" value="<?php echo $tarjeta_circulacion ; ?>" > 
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Año Tarjeta Circulación:
                        </td>
                        <td>
                          <input type="text" name="anio_tarjeta_circulacion" value="<?php echo $anio_tarjeta_circulacion; ?>" >
                        </td>
                      </tr>
                      <tr>
                        <td>
                          Comentarios:
                        </td>
                        <td>
                          <textarea name="comentarios"><?php echo $comentarios; ?></textarea>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <input type="submit" value="Guardar Registro" >
                        </td>
                      </tr>

                    </table>




                  </form>

                  <?php



                  if(!empty($_POST)){
                    $_POST['tarjeta_circulacion'] = $_POST['placa'].'.pdf';
                  if( $veh = $vehiculo->insert($_POST) > 0){
                    $name = $_POST['placa'].'.pdf';
                    copy($_FILES['tarjeta_circulacion']['tmp_name'], '../files/tarjetas_circulacion/'.$name) ;
                    ?>
                    <script type="text/javascript">
                      alert("Registro guardado con éxito");
                      window.location="index.php";
                    </script>
                    <?php
                  }
                  else {
                    ?>
                     <script type="text/javascript">
                        alert("Error al cargar registro");
                        window.location="index.php";
                      </script>
                    <?php
                  }
                }

                  ?>

              </div>

<!--              <div id="tabla_captura" >

                <table border="1">
                  <tr>
                    <th>Orden de servicio</th>
                    <th>Fecha</th>
                    <th>Referencia</th>
                    <th>Numero de puntos</th>
                    <th>Importe</th>
                  </tr>
                 
                </table>
              </div>
-->
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
