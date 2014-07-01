<?php
 

    /* INCLUSION DE LIBRERIAS */

     include_once("../library/Componente.php");
     include_once("../library/Propietario.php");
    

     $componente = new Componente();
     $propietario = new Propietario();
    
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

                <?php
               // var_dump($propietario->getConexion()->query("show fields from propietarios"));
                ?>

                  <form method="post">

                    <?php
                      if(!empty($_GET)){
                        if($propietario->loadById($_GET['id_propietario'])){
                          $id = $propietario->getId() ;
                          $razon_social = $propietario->getRazonSocial() ;
                        }
                        else{
                          ?>
                          <script type="text/javascript">
                          alert("Error al cargar registro");
                          window.location="propietarios.php";
                          </script>
                          <?php
                        }
                      }
                      else{
                        $id = '' ;
                        $razon_social = '' ;
                      }
                    ?>
                    <input type="hidden" name="id_propietario" value="<?php echo $id ; ?>">
                    <table>
                      <tr>
                        <td>
                          Razón social:
                        </td>
                        <td>
                          <input type="text" name="razon_social" value="<?php echo $razon_social; ?>" required >
                        </td>
                      </tr>
                      <tr>
                        <td colspan="2">
                          <input type="submit" value="Guardar Registro" >
                        </td>
                      </tr>

                    </table>

                  </form>

              </div>

              <?php
                if(!empty($_POST)){

                  if($propietario->insert($_POST)){
                    ?>
                    <script type="text/javascript">
                      alert("Registro guardado con éxito");
                      window.location="propietarios.php";
                    </script>
                    <?php
                  }
                  else {
                    ?>
                     <script type="text/javascript">
                        alert("Error al cargar registro");
                        window.location="propietarios.php";
                      </script>
                    <?php
                  }
                }
              ?>

            <div id="tabla_captura" >
              
                <table border="1">
                  <tr>
                    <th width="35">No.</th>
                    <th>Arrendadora / Propietario</th>
                  </tr>
                  <?php
              
                  $array_propietarios = $propietario->getAll();
                    if(!empty($array_propietarios)){
                      $contador = 1 ;
                      foreach ($array_propietarios as $value) {
                      ?>
                      <tr>
                        <td>
                          <?php
                            echo $contador ++ ;
                          ?>
                        </td>
                        <td>
                          <?php
                            echo $value['razon_social'] ;
                          ?>
                        </td>
                      </tr>
                      <?php
                      }
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
