<!DOCTYPE html>
<html lang="es">
    <head>
        <title>DMM | ITMORELIA</title>
        <meta charset="utf-8"/>
        <meta name="keywords" content="pagina de IGE"/>
        <meta name="author" content="Kevin Erick Angel Medrano"/>
        <link rel="icon" type="image/ico" href="Imagenes/icotec.ico"/>
        <link rel="stylesheet" type="" href="orga.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
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
    <body>  
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.0.min.js"></script>    
        <script type="text/javascript">
            $(document).ready(function(){
                $(".dropdown-button").dropdown();
                $('.materialboxed').materialbox();
                $(".button-collapse").sideNav();
                $('select').material_select();
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
            <br>
            <br>
            <div>
                <h5 class="center-align">Índices de reprobación Ingeniería en Materiales</h6>
            </div>
            <br>
            <br>
            <div class="row center-align">
            <form class="col s12 m12 l12 center-align">
                <select id="ListaInidce" name="ListaInidce" onchange="window.open(this.options[this.selectedIndex].value,'_blank')" class="center-align">
                    <?php
                        //Conexion a la base de datos
                        require_once("BD.php");
                        $db = new BD();
                        $SQL = "SELECT periodo, fecha FROM indices WHERE carrera='Materiales'";
                        $resultado = $db->ejecutar($SQL);
                        foreach($resultado as $fila){
                    ?>
                        <option value="admin/Indices/Materiales/<?=$fila[0]?>_<?=$fila[1]?>.pdf"><?=$fila[0]?> <?=$fila[1]?></option>
                        <h4><?=$fila[0]?></h4>
                    <?php
                        }
                    ?>
                </select>
            </form>
            </div>
            <br>
        </div>
        <div id="feet" class="feet">
            <script type="text/javascript">
                    $("#feet").load("footer.html");
            </script> 
        </div>
    </body>
</html>
