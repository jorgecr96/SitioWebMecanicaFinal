<!DOCTYPE html>
<!-- Artesania y loza Mexicana -->

<html lang="es">
    <head>
        <title>ITMORELIA| Dept. Metal-Mecánica</title>
        <meta charset="utf-8"/>
        <meta name="keywords" content="Investigaciones del Departamento de Metal-Mecánica"/>
        <meta name="author" content="Jorge Cervantes"/>
        <link rel="icon" type="image/ico" href="Imagenes/icotec.ico"/>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" type="text/css" href="estilo.css" />
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
        <!--Import jQuery before materialize.js-->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>    
        <script type="text/javascript">
            $(document).ready(function(){
                $(".dropdown-button").dropdown();
                $('.materialboxed').materialbox();
                $(".button-collapse").sideNav();
            });            
        </script>
        <div id="navbar" class="navbar">
            <script type="text/javascript">
                $("#navbar").load("navbar.html");
            </script> 
        </div>
        <!--Cuerpo de la pagina, perfil de ingreso-->
        <div class="Cprincipal_index card-panel grey lighten-4">
        <br />
        <br />
        <div class="row">
            <header>
                <img class="responsive-img" src="Imagenes/head.png" alt="header pagina perfiles" height="90px" width="3000px">     
                <div class="row" >
                <br />  
            </header><br />
        </div>
        <div style="font-size: 15px">
        <div style="text-align: justify;">
        <h5 class="center-align">Investigaciones</h5><br />
        <br /><br />
        <div class="row">
        <?php
            require ("admin/DB.php");
            $conexion = new DB();
            $sql = "SELECT titulo, descripcion, archivo FROM investigaciones ORDER BY id DESC";
            $resultado=$conexion->ejecutar($sql);
            $i=0;
            foreach($resultado as $fila){ 
              $admin = "admin/"     ;
              $archivo = $fila ['archivo'];
              $descripcion= $fila['descripcion'];
              $titulo=$fila['titulo'];
                if($i==0){
              ?>
                <div class="col s12 m8 offset-m2 l4 offset-l1">
                    <div class="card ">
                        <div class="card-content white-text #b71c1c red darken-4">
                            <span class="card-title"><?php echo $titulo;?></span>
                            <p><?php echo $descripcion;?></p>
                        </div>
                        <div class="card-action #b71c1c red darken-1git">
                            <a href="admin/<?php echo $archivo;?>">Ver Más</a>
                        </div>
                    </div>
                </div>
            <?php
                $i=$i+1;
                }else{
                    ?>
                <div class="col s12 m8 offset-m2 l4 offset-l2">
                    <div class="card">
                        <div class="card-content white-text #ffab00 amber accent-4">
                            <span class="card-title"><?php echo $titulo;?></span>
                            <p><?php echo $descripcion;?></p>
                        </div>
                        <div class="card-action #ffab00 amber accent-1">
                            <a href="admin/<?php echo $archivo;?>">Ver Más</a>
                        </div>
                    </div>
                </div>
            <?php
                    $i=0;
                }
            }
          ?>
        </div>
        <div id="feet" class="feet">
            <script type="text/javascript">
                $("#feet").load("footer.html");
            </script> 
        </div>
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>   
</html> 
