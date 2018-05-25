<!DOCTYPE html>
<!-- Artesania y loza Mexicana -->
<?php 
require_once("DB.php");
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

    foreach($_GET as $indice => $valor){
        $_GET[$indice] = htmlspecialchars($valor);
    }

    extract($_GET);
    if(isset($usuarioLogIn) && isset($password)){
      if($nombre!="" && $psw != ""){
        $conexion = new DB();
        $SQL = "SELECT id FROM usuarios WHERE nombre='".$usuarioLogIn."' AND password='".$password."';";
        $resultado = $conexion->ejecutar($SQL);
        if($resultado>0){
            session_start();
            $_SESSION['user'] = $resultado->id;
            $_SESSION['validated'] = "ok";
        }
        else{       
        }
    }
    }
    
}
?>
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
    <form action="EliminarPersonal.php" method="post" enctype="multipart/form-data" class="datos_usuarios" id="logInForm">
    <div class="row">
      <div class="input-field col s12">
        <input id="usuarioLogIn" type="text" class="validate">
        <label for="e">Usuario</label>
      </div> 
      <div class="row">
        <div class="input-field col s12">
          <input id="password" type="password" class="validate">
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
 <div id="feet" class="feet">
            <script type="text/javascript">
                    $("#feet").load("footer.html");
            </script> 
        </div>
    </body>
</html> 