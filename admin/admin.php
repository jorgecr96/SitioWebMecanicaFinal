<!DOCTYPE html>
<!-- Artesania y loza Mexicana -->

<html lang="es">
  <head>
    <title>ITMORELIA| Dept. Metal-Mec�nica</title>
    <meta charset="utf-8"/>
    <link rel="icon" type="image/ico" href="Imagenes/icotec.ico"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Materialized libraries -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="css/index.css" />
    <link rel="icon" href="img/icon.png"/>
    <!--Import jQuery before materialize.js-->
    <!-- Compiled and minified JavaScript -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <script type="text/javascript" src="/SitioWebMecanica/js/admin.js"/></script>
    <style type="text/css">
      body{
       background: #dddddd;
       background-repeat: no-repeat;
       background-position: center center;
       background-attachment: fixed;
      }
      </style>
  </head>


  <body>  
    <!--encabezado y menus-->
    <ul id="reticulas" class="dropdown-content">
      <li><a id="agregarm" onclick="agregarpersonal()">Agregar materia</a></li>
      <li><a id="editarm">Editar materia</a></li>
      <li><a id="eliminarm">Eliminar materia</a></li>
    </ul>
    <ul id="personal" class="dropdown-content">
      <li><a id="agregarp" onclick="agregarpersonal()">Agregar personal</a></li>
      <li><a id="editarp">Editar personal</a></li>
      <li><a id="eliminarp">Eliminar personal</a></li>
    </ul>

    <nav>
      <div class="nav-wrapper grey darken-1">
        <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only left"><i class="material-icons">menu</i></a>
        <a href="#" class="brand-logo center"><h5>Metal Mecánica</h5></a>
      </div>
    </nav>

    <nav class="hide-on-med-and-down">
      <div class="nav-wrapper grey darken-1 center-align">
          <ul class="center hide-on-med-and-down">
          <li><a href="#" class="dropdown-button" data-activates="personal">Personal<i class="material-icons right" >arrow_drop_down</i></a></li>
          <li><a href="#" class="dropdown-button" data-activates="reticulas">Reticula<i class="material-icons right" >arrow_drop_down</i></a></li>
          </ul>
      </div>
    </nav>
          
    <div class="Cprincipal_index card-panel grey lighten-4" id="contenedor"></div>

    <!--Pie de pagina, datos de contato-->
    <div id="feet" class="feet">
      <script type="text/javascript">
        $("#feet").load("footer.html");
      </script> 
    </div>
  </body>
</html> 