<?php 
            #inicio de sesión para variables de verificación 
            session_start();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>ITMORELIA| Dept. Metal-Mec�nica</title>
        <meta charset="utf-8"/>
        <meta name="author" content="Carlos Villanueva Cervantes"/>
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">  
        <link rel="icon" type="image/ico" href="Imagenes/icotec.ico"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        <script type="text/javascript" src="/SitioWebMecanica/js/admin.js"/></script>
        <link rel="stylesheet" type="text/css" href="css/index.css" />
        <link rel="stylesheet" type="text/css" href="estilo.css" />

        <style type="text/css">
            body{
                background: #dddddd;
                background-repeat: no-repeat;
                background-position: center center;
                background-attachment: fixed;
           }
        </style>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".button-collapse").sideNav();
                $('.tabs').tabs();
            });
        </script>   
    </head>
    <body >
        <!--ENCABEZADO Y MENU-->
        <?php
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTMLFile("navbar.html");
            echo $doc->saveHTML();
        ?>
        <?php
            #condiciones para veerificiar que las peticiones fueron aceptadas o rechazadas
            if($_SESSION['result'] == 'guardado'){
                echo '<script>alert("Especialidad guardada exitosamente!");</script>';
                //echo "<nav><div class=\"nav-wrapper light-green accent-4\"><H2>Guardado exitosamente</H2></div></nav>";
            }
            if($_SESSION['result'] == 'editado'){
                echo '<script>alert("Especialidad editada exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'eliminado'){
                echo '<script>alert("Especialidad eliminada exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'error'){
                echo '<script>alert("Error, vuelva a intentarlo más tarde!");</script>';
            }
            $_SESSION['result']= "";
        ?>
        <div class="Cprincipal_index card-panel grey lighten-4">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#alta" class="teal-text text-darken-2">AGREGAR ESPECIALIDAD</a></li>
                        <li class="tab col s3"><a href="#eliminar" class="teal-text text-darken-2">ELIMINAR ESPECIALIDAD</a></li>
                    </ul>
                </div>
                <!-- SECCION PARA AGREGAR A LOS PROFESORES -->
                <div id="alta" class = "col s12">
                    <h1>Agregar Especialidad</h1>
                    <form action="agregarEspecialidad.php" method="post" enctype="multipart/form-data" id="agregarEspecialidadForm">
                        <input type="text" name= "nomesp" id="nomesp" placeholder="Nombre de especialidad">
                        <div class="input-field col s12">
                            <select id="carrera" name="carrera">
                                <option value="mecanica">Mec&aacutencia</option>
                                <option value="mecatronica">Mecatr&oacutenica</option>
                            </select>
                            <label>Carrera</label>
                        </div>
                        <br><br>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                            <i class="material-icons right">save</i>
                        </button>
                    </form>
                </div>
                <!-- SECCION PARA ELIMINAR A LOS PROFESORES -->
                <div id="eliminar" class = "col s12">
                    <h1>Eliminar Especialidad</h1>
                    <form action="eliminarEspecialidad.php" method="post" enctype="multipart/form-data" id="eliminarEspecialidadForm">
                        <div class="input-field col s12">
                            <select id="eliminaresp" name="eliminaresp">
                                <option value="x" disabled selected>Elija una especialidad</option>
                                <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT Nombre FROM especialidad";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                                ?>
                                <option value="<?=$fila[0]?>">
                                <?=$fila[0]?>
                                </option>  
                                <?php
                                }
                                ?>
                            </select>
                            <label>Eliminar</label>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Eliminar
                            <i class="material-icons right">delete_forever</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <footer class="page-footer grey darken-1">
            <div class="footer-copyright">
                <div class="container">
                    Derechos Reservados. © 2018 Instituto Tecnológico de Morelia.
                </div>
            </div>
        </footer>
    </body>
</html> 