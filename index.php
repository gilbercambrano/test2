<?php

  include_once('library/Componente.php');
  $componente = new Componente();

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link href="img/favicon.ico" type="image/x-icon" rel="shortcut icon" />
<title>.:Generador de obra:. </title>
</head>

<body>
<div id="container">
    <div id="header">
         
          <div id="pemex"></div>
          <div id="usuario" >
             <table>
              <tr>
                <th width="380">Sistema Electrónico Logística y Transporte</th>
              </tr>
              <tr width="350">
                <td style="text-align:left; width:350px;">&nbsp;</td>
                <td style="text-align:center;">&nbsp;</td>
              </tr>
            </table>
            </div>
            <div id="smt"></div>

        </div>   






        
        <div id="menu">
         
        </div>

        
        
        
    <div id="content_generador">
        
        
        
        <div id="content_main_index">
            <!-- INICIO DE LA PARTE EDITABLE -->

            
              

                <form method="post" >

                  <fieldset id="field_index">
                    <legend>Inicio de sesión</legend>
                   

                    <table>
                      <tr>
                        <td>Usuario:</td>
                        <td><input type="text" name="usuario" required ></td>
                      </tr>
                      <tr>
                        <td>Contraseña:</td>
                        <td><input type="password" name="password" required ></ins></td>
                      </tr>
                    </table>


                  </fieldset>
               
                  <br>
                  <input type="submit" value="Iniciar sesión" >
                </form>


            
           <?php

/*

            if(!empty($_POST)){
              
                ?>
                <div id="error_login">
                <?php
                if( $usuario ->loadByUsuario($_POST['usuario']) == 0){
                  echo "Clave de usuario incorrecta.";
                }
                else if($usuario->getPassword() != md5($_POST['password']) ){
                 echo "La contraseña intruducida es incorrecta."; 
                }
                 else{
                  $_SESSION=array(
                      'nombre'=>$usuario->getNombre(),
                      'perfil'=>$usuario->getPerfil(),
                      'compania'=>$usuario->getCompania(),
                      'usuario'=>$usuario->getUsuario()
                    );

                  switch ($_SESSION['perfil']) {
                    case 'ESTIMACIONES':
                      header("location: capturas");
                      break;
                    case 'SUPERVISOR':
                      header("location: revisiones");
                      break;
                    case 'COORDINADOR':
                      header("location: capturas");
                      break;
                    case 'RESIDENTE':
                      header("location: revisiones");
                      break;
                    case 'SUPERINTENDENTE DE OBRA':
                      header("location: revisiones");
                      break;
                    case 'ADMINISTRADOR':
                      header("location: administracion");
                      break;

                  }

                  
                }
*/
                ?>
              </div>
                <?php
               
//            }


           ?>
           

            <!-- FIN DE LA PARTE EDITABLE -->
        </div>
        <div id="content_bottom"></div>
            
        

        </div> 
        <div id="footer"> <!-- inicio footer -->
            <center>
            <?php
                echo $componente->getFooter(); 
            ?>
            </center>

        </div> <!-- fin footer -->
   </div>
</body>
</html>