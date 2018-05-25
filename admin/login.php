<?php 
session_start();
require_once("DB.php");
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }

    extract($_POST);

    if(isset($user) && isset($password)){
        $conexion = new DB();
        $resultado = $conexion->iniciarSesion($user, $password);
        if($resultado){   
            $_SESSION['user'] = $user;
            header('Location: reticula_admin.php');
        }
        else{     
          echo  '<script>alert("Usuario o contraseña incorrectos vuelva a intentarlo");</script>';
        }
    }
}
?>
<!DOCTYPE html>
<!-- Artesania y loza Mexicana -->
<html lang="es">
    <head>
        <title>ITMORELIA| Dept. Metal-Mec�nica</title>
        <meta charset="utf-8"/>
       
        <meta name="keywords" content="pagina de Mecanica"/>
        
        <meta name="author" content="Carlos V"/>
        <link rel="icon" type="image/ico" href="Imagenes/icotec.ico"/>

        <!-- Materialized libraries -->
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
           <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

         <link rel="stylesheet" type="text/css" href="index.css" />
        <style type="text/css">
            body{
                background: #dddddd;
                background-repeat: no-repeat;
                background-position: center center;
                background-attachment: fixed;
           }
           .datos_usuarios {   
        }
        </style>
       </head>


<body >

<!--encabezado y menus-->
<nav>
    <div class="nav-wrapper grey darken-1">
      <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only left"><i class="material-icons">menu</i></a>
      <a href="#" class="brand-logo center"><h5>Metal Mecánica</h5></a>
    </div>
</nav>
  <div class="Cprincipal_index card-panel grey lighten-4" style="text-align:center; margin-top: 10%; margin-bottom: 10%; margin-left: 25%; margin-right: 25%;">
    <h6>Administrador</h6>
    <form action="login.php" method="post" enctype="multipart/form-data" class="datos_usuarios" id="logInForm">
    <div class="row">
      <div class="input-field col s12">
        <input id="user" name="user" type="text" class="validate">
        <label for="name">Usuario</label>
      </div> 
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" name="password" class="validate">
          <label for="password">Contraseña</label>
        </div>
      </div> 
    </div>    
    <button class="btn waves-effect waves-light" type="submit" name="action">Entrar
      <i class="material-icons right">send</i>
    </button>
    </form>
  </div>


 <!--Pie de pagina, datos de contato-->
 <footer class="page-footer grey darken-1">
          <div class="container">
            <div class="row">
              <div class="col l4 s12">
                <h5 class="white-text">Redes Sociales</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="https://www.facebook.com/IGE-ITMorelia-Oficial-137692846975721/" target="_blank"><img src="Imagenes/face.jpg">Facebook</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://twitter.com/itmoficial" target="_blank"> <img src="Imagenes/tiwter.jpg">Twitter</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://www.youtube.com/user/ITMoreliaOficial/" target="_blank"> <img src="Imagenes/youtube.jpg">Youtube</a></li>
                  <li><a class="grey-text text-lighten-3" href="https://www.linkedin.com/edu/instituto-tecnol%C3%B3gico-de-morelia-173011" target="_blank"><img src="Imagenes/link.jpg">Linkedin</a></li>
                </ul>
              </div>
              <div class="col l4 s12">
                <h5 class="white-text">Vínculos Académicos</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="http://www.tecnm.mx/" target="_blank">Tecnológico Nacional De México</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.ets.org/es/toefl"  target="_blank">Toefl</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.ceneval.edu.mx/" target="_blank">Ceneval</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.anfei.mx/" target="_blank">Anfei</a></li>
                  <li><a class="grey-text text-lighten-3" href="http://www.conacyt.mx/" target="_blank">Consejo Nacional De Ciencia Y Tecnología</a></li>
                </ul>
              </div>
              <div class="col l4 s12">
                <h5 class="white-text">Contáctanos</h5>
                <ul>
                    Teléfonos: 4433121570 Ext.248<br />
                    Email: metal_Mecánica@itmorelia.edu.mx<br />
                    Dirección: Avenida Tecnológico No. 1500. Lomas de Santiaguito, Edificio AA. C.P. 58120 Morelia, Michoacán, México.<br />
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
                Derechos Reservados. © 2018 Instituto Tecnológico de Morelia.
            </div>
          </div>
        </footer>
    </body>
</html> 