<!DOCTYPE html>
<!-- Artesania y loza Mexicana -->

<html lang="es">
    <head>
        <title>ITMORELIA| Dept. Metal-Mec�nica</title>
        <meta charset="utf-8"/>
       
        <meta name="keywords" content="pagina principal metalmecanica"/>
        
        <meta name="author" content="Yael Revuelta"/>
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
        </style>
       </head>


<body >
        <script type="text/javascript">
            $(document).ready(function(){
                $(".dropdown-button").dropdown();
                $('.materialboxed').materialbox();
                $(".button-collapse").sideNav();
                $('select').material_select();
                $('.carousel.carousel-slider').carousel({fullWidth: true});     
                function autoplay() {
                    $('.carousel').carousel('next');
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
      <img class="responsive-img" src="Imagenes/head.png" alt="header pagina quienes somos" height="90px" width="3000px">
    </div>
   
    

    <!--Carusel de imagenes -->
    <div class="carousel carousel-slider center z-depth-5" data-indicators="true">

      <div class="carousel-item grey white-text">
        <div class="carousel-fixed-item"><img src="Imagenes/1.png"></div>
        <h2>Mecanica imagen 1</h2>
        <p class="white-text">This is your first panel</p>
      </div>

      <div class="carousel-item grey darken-1 white-text" href="#two!">
        <div class="carousel-fixed-item"><img src="Imagenes/5.png"></div>
        <h2>Second Panel</h2>
        <p class="white-text">This is your second panel</p>
      </div>

      <div class="carousel-item grey darken-2 white-text" href="#three!">
        <div class="carousel-fixed-item"><img src="Imagenes/3.png"></div>
        <h2>Third Panel</h2>
        <p class="white-text">This is your third panel</p>
      </div>

      <div class="carousel-item grey darken-3 white-text" href="#four!">
        <div class="carousel-fixed-item"><img src="Imagenes/4.png"></div>
        <h2>Fourth Panel</h2>
        <p class="white-text">This is your fourth panel</p>
      </div>

    </div>


    <div class="sitios_interes2 container">
      <center class="flow-text grey-text ">Sitios de Interés</center><br>
    </div>

    <div class="row">
      <div class="col s6 m6 l6">
        <div class="card">
          <div class="card-image">
            <a href="http://www.conacytprensa.mx/"><img src="Pagina/images/logoAICgris.png"></a>
            <span class="card-title">Card Title</span>
          </div>
        </div>
      </div>
      <div class="col s6 m6 l6">
        <div class="card">
          <div class="card-image">
            <a href="http://cacei.org.mx/index.php"><img src="Pagina/images/cacei.png"></a>
          </div>
        </div>
      </div>
      <div class="col s6 m6 l6">
        <div class="card">
          <div class="card-image">
          <a href="https://www.entrepreneur.com/es"><img src="Imagenes/entrepreneur-logo.png"></a>
            <span class="card-title">Card Title</span>
          </div>
        </div>
      </div>
    </div>
            

  </div>

 <!--Pie de pagina, datos de contato-->
 <div id="feet" class="feet">
            <script type="text/javascript">
                    $("#feet").load("footer.html");
            </script> 
        </div>
    </body>
</html> 