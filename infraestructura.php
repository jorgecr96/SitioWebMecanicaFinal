<!DOCTYPE html>
<!-- Artesania y loza Mexicana -->
<html lang="es">
  <head>
    <title>ITMORELIA| Dept. Metal-Mec�nica</title>
    <meta charset="utf-8"/>
    <meta name="keywords" content="index de metalmecanica"/>       
    <meta name="author" content="Yael Revuelta"/>
    <link rel="icon" type="image/ico" href="Imagenes/icotec.ico"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <style type="text/css">
      body{
        background: #dddddd;
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
      }
      #sombra{
        -webkit-text-stroke: 0.70px black;
      }
      #sombrah5{
        -webkit-text-stroke: 0.40px black;
      }
      .Cprincipal_index{
        width: 90%;
        height: auto;
        margin-top: 5%;
        margin-left: 5%;  
        border-bottom: solid iem*
      }
    </style>
  </head>
  <body >
    <script type="text/javascript">
      $(document).ready(function(){
        $(".dropdown-button").dropdown();
        $('.materialboxed').materialbox();
        $(".button-collapse").sideNav();
        $('select').material_select();
        $('.carousel.carousel-slider').carousel({fullWidth: false});
        $('.slider').slider({fullWidth: false});     
        function autoplay() {
          $('.slider').slider('next');
          setTimeout(autoplay, 4500);
        }
        jQuery(document).ready(function() {
          setTimeout(function() {
            autoplay()
          }, 4500);
        });
      });            
    </script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
        <div id="navbar" class="navbar">
            <script type="text/javascript">
                $("#navbar").load("navbar.html");
            </script>
        </div>
    <div class="Cprincipal_index card-panel grey lighten-4">
      <div>
        <img class="responsive-img" src="Imagenes/head.png" alt="logos" height="90px" width="3000px">
      </div><br />
      <!--Carusel de imagenes -->
      <div class="slider">
        <ul class="slides">
          <?php
            require ("admin/DB.php");
            $conexion = new DB();
            $sql = "SELECT nombre, descripcion, foto FROM infraestructura";
            $resultado=$conexion->ejecutar($sql);
            foreach($resultado as $fila){ 
              $admin = "admin/"     ;
              $img = $fila ['foto']; 
          ?>
          <li><img src="<?php echo $admin . $img ; ?>">
            <div class="caption center-align">
              <div id="sombra">
                  <h3><?php echo $fila ['nombre']; ?></h3>
              </div>
              <h5 class="light grey-text text-lighten-3"><?php echo $fila ['descripcion']; ?></h5>
            </div>
          </li>
            <?php 
             } 
            ?>
        </ul>
      </div>
      </div>
    </div>
    <!--Pie de pagina, datos de contato-->
    <div id="feet" class="feet">
      <script type="text/javascript">
        $("#feet").load("footer.html");
      </script> 
    </div>
    <script type="text/javascript" src="js/materialize.min.js"></script>
  </body>
</html> 