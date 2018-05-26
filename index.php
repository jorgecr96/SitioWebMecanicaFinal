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
    <?php
      $doc = new DOMDocument();
      libxml_use_internal_errors(true);
      $doc->loadHTMLFile("navbar.html");
      echo $doc->saveHTML();
    ?>  
    <div class="Cprincipal_index card-panel grey lighten-4">
      <div>
        <img class="responsive-img" src="Imagenes/head.png" alt="header pagina quienes somos" height="90px" width="3000px">
      </div><br />
      <!--Carusel de imagenes -->
      <div class="slider">
        <ul class="slides">
          <?php
            require ("admin/DB.php");
            $conexion = new DB();
            $sql = "SELECT titulo, descripcion, imagen, url FROM noticias ORDER BY fecha DESC LIMIT 5";
            $resultado=$conexion->ejecutar($sql);
            foreach($resultado as $fila){ 
              $admin = "admin/"     ;
              $img = $fila ['imagen']; 
          ?>
          <li><img src="<?php echo $admin . $img ; ?>">
            <div class="caption center-align">
              <div id="sombra">
                <a class="light grey-text text-lighten-3" target="blank" href="http://<?php echo $fila ['url']; ?>"><h3><?php echo $fila ['titulo']; ?></h3></a>
              </div>
              <h5 class="light grey-text text-lighten-3"><?php echo $fila ['descripcion']; ?></h5> 
              <a class="waves-effect green accent-4 z-depth-4 btn" target="blank" href="http://<?php echo $fila ['url']; ?>" ><i class="material-icons right">insert_link</i>Ver más</a>
            </div>
          </li>
            <?php 
             } 
            ?>
        </ul>
      </div>
      <br /><br />
      <div class="sitios_interes2 container">
        <center class="flow-text grey-text ">Sitios de Interés</center><br>
      </div>    
      <div class="row">
      <?php
        $conexion = new DB();
        $resultado=$conexion->ejecutar("SELECT enlace, imagen FROM sitio_interes");
        foreach($resultado as $fila){ 
          $admin = "admin/";
          $img = $fila ['imagen']; 
          ?>
          <div class="col s6 m6 l6">
          <div class="card">
            <div class="card-image">
              <a href="http://<?php echo $fila['enlace']; ?>"><img src="<?php echo $admin . $img ; ?>"></a>
              <span class="card-title"></span>
            </div>
          </div>
        </div>

       <?php 
          } 
        ?>



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