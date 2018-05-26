<!DOCTYPE html>
<html lang="es">
    <head>
        <title>DMM | ITMORELIA</title>
        <meta charset="utf-8"/>
        <meta name="keywords" content="pagina de IGE"/>
        <meta name="author" content="Kevin Erick Angel Medrano"/>
        <link rel="icon" type="image/ico" href="Imagenes/icotec.ico"/>
        <link rel="stylesheet" type="" href="css/orga.css" />
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
            <img class="responsive-img" src="Imagenes/head.png" height="90px" width="3000px">
            </div>
            <div class="Cprincipal_index card-panel grey lighten-4">
                <div id="wrapper">
                    <ol class="organizational-chart">
                        <li>
                            <div>
                                <?php
                                    require_once("BD.php");
                                    $db = new BD();
                                    $SQL = "SELECT CV, foto, nombre FROM profesor WHERE Tipo ='jefe_de_departamento' AND Carrera='mecatronica'";
                                    $resultado = $db->ejecutar($SQL);
                                    foreach($resultado as $fila){
                                ?>
                                <a href="admin/<?=$fila[0]?>">
                                    <img class="responsive-img" src="admin/<?=$fila[1]?>" height="90px" width="90px">
                                </a>
                                <h3>Jefe de Departamento</h3>
                                <h4><?=$fila[2]?></h4>
                                <?php
                                    }
                                ?>
                            </div>
                            <ol>
                                <li>
                                    <div>
                                        <?php
                                            require_once("BD.php");
                                            $db = new BD();
                                            $SQL = "SELECT CV, foto, nombre FROM profesor WHERE Tipo ='presidente_de_academia' AND Carrera='mecatronica'";
                                            $resultado = $db->ejecutar($SQL);
                                            foreach($resultado as $fila){
                                        ?>
                                        <a href="admin/<?=$fila[0]?>">
                                            <img class="responsive-img" src="admin/<?=$fila[1]?>" height="90px" width="90px">
                                        </a>
                                        <h4>Presidente de Academia</h4>
                                        <h5><?=$fila[2]?></h5>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                    <ol>
                                        <li>
                                            <div>
                                                <?php
                                                    require_once("BD.php");
                                                    $db = new BD();
                                                    $SQL = "SELECT CV, foto, nombre FROM profesor WHERE Tipo ='secretario_de_academia' AND Carrera='mecatronica'";
                                                    $resultado = $db->ejecutar($SQL);
                                                    foreach($resultado as $fila){
                                                ?>
                                                <a href="admin/<?=$fila[0]?>">
                                                    <img class="responsive-img" src="admin/<?=$fila[1]?>" height="90px" width="90px">
                                                </a>
                                                <h5>Secretario de Academia</h5>
                                                <h6><?=$fila[2]?></h6>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <?php
                                                    require_once("BD.php");
                                                    $db = new BD();
                                                    $SQL = "SELECT CV, foto, nombre FROM profesor WHERE Tipo ='coordinador_de_carrera' AND Carrera='mecatronica'";
                                                    $resultado = $db->ejecutar($SQL);
                                                    foreach($resultado as $fila){
                                                ?>
                                                <a href="admin/<?=$fila[0]?>">
                                                    <img class="responsive-img" src="admin/<?=$fila[1]?>" height="90px" width="90px">
                                                </a>
                                                <h5>Coordinador de Carrera</h5>
                                                <h6><?=$fila[2]?></h6>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <?php
                                                    require_once("BD.php");
                                                    $db = new BD();
                                                    $SQL = "SELECT CV, foto, nombre FROM profesor WHERE Tipo ='coordinador_de_programa_de-tutorias' AND Carrera='mecatronica'";
                                                    $resultado = $db->ejecutar($SQL);
                                                    foreach($resultado as $fila){
                                                ?>
                                                <a href="admin/<?=$fila[0]?>">
                                                    <img class="responsive-img" src="admin/<?=$fila[1]?>" height="90px" width="90px">
                                                </a>
                                                <h5>Coordinador de Programa de Tutorias</h5>
                                                <h6><?=$fila[2]?></h6>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <?php
                                                    require_once("BD.php");
                                                    $db = new BD();
                                                    $SQL = "SELECT CV, foto, nombre FROM profesor WHERE Tipo ='Jefe_de_proyecto_de_docencia' AND Carrera='mecatronica'";
                                                    $resultado = $db->ejecutar($SQL);
                                                    foreach($resultado as $fila){
                                                ?>
                                                <a href="admin/<?=$fila[0]?>">
                                                    <img class="responsive-img" src="admin/<?=$fila[1]?>" height="90px" width="90px">
                                                </a>
                                                <h5>Jefe de Proyecto de Docencia</h5>
                                                <h6><?=$fila[2]?></h6>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <?php
                                                    require_once("BD.php");
                                                    $db = new BD();
                                                    $SQL = "SELECT CV, foto, nombre FROM profesor WHERE Tipo ='Jefe_de_proyecto_de_vinculacion' AND Carrera='mecatronica'";
                                                    $resultado = $db->ejecutar($SQL);
                                                    foreach($resultado as $fila){
                                                ?>
                                                <a href="admin/<?=$fila[0]?>">
                                                    <img class="responsive-img" src="admin/<?=$fila[1]?>" height="90px" width="90px">
                                                </a>
                                                <h5>Jefe de Proyecto de Vinculación</h5>
                                                <h6><?=$fila[2]?></h6>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <?php
                                                    require_once("BD.php");
                                                    $db = new BD();
                                                    $SQL = "SELECT CV, foto, nombre FROM profesor WHERE Tipo ='Jefe_de_proyecto_de_investigacion' AND Carrera='mecatronica'";
                                                    $resultado = $db->ejecutar($SQL);
                                                    foreach($resultado as $fila){
                                                ?>
                                                <a href="admin/<?=$fila[0]?>">
                                                    <img class="responsive-img" src="admin/<?=$fila[1]?>" height="90px" width="90px">
                                                </a>
                                                <h5>Jefe de Proyecto de Investigación</h5>
                                                <h6><?=$fila[2]?></h6>
                                                <?php
                                                    }
                                                ?>
                                            </div>
                                        </li>
                                    </ol>
                                </li>
                                <li>
                                    <div>
                                        <h4>Profesores</h4>
                                    </div>
                                    <ol>
                                        <?php
                                            require_once("BD.php");
                                            $db = new BD();
                                            $SQL = "SELECT CV, foto, nombre FROM profesor WHERE Tipo ='Profesor' AND Carrera='mecatronica'";
                                            $resultado = $db->ejecutar($SQL);
                                            foreach($resultado as $fila){
                                        ?>
                                                <li>
                                                    <div>
                                                        <a href="admin/<?=$fila[0]?>">
                                                            <img class="responsive-img" src="admin/<?=$fila[1]?>" height="90px" width="90px">
                                                        </a>
                                                        <h5>Presidente de Academia</h5>
                                                        <h6><?=$fila[2]?></h6>
                                                    </div>
                                                </li>
                                        <?php
                                            }
                                        ?>
                                    </ol>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
        <div id="feet" class="feet">
            <script type="text/javascript">
                    $("#feet").load("footer.html");
            </script> 
        </div>
    </body>
</html>
