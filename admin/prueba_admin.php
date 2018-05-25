<?php 
#inicio de sesión para variables de verificación 
    session_start();
    session_start();
    if($_SESSION['user']!=""){
        //echo "Bienvenido ".$_SESSION['user'];
    }
    else{
        header('Location: login.php');
    }

?>
<!DOCTYPE html>
<!-- Artesania y loza Mexicana -->
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
                echo '<script>alert("Profesor guardado exitosamente!");</script>';
                //echo "<nav><div class=\"nav-wrapper light-green accent-4\"><H2>Guardado exitosamente</H2></div></nav>";
            }
            if($_SESSION['result'] == 'editado'){
                echo '<script>alert("Profesor editado exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'eliminado'){
                echo '<script>alert("Profesor eliminado exitosamente!");</script>';
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
                        <li class="tab col s3"><a href="#alta" class="teal-text text-darken-2">AGREGAR PROFESOR</a></li>
                        <li class="tab col s3"><a href="#modificar" class="teal-text text-darken-2">MODIFICAR PROFESOR</a></li>
                        <li class="tab col s3"><a href="#eliminar" class="teal-text text-darken-2">ELIMINAR PROFESOR</a></li>
                    </ul>
                </div>
                <!-- SECCION PARA AGREGAR A LOS PROFESORES -->
                <div id="alta" class = "col s12">
                    <h1>Agregar Personal</h1>
                    <form action="subirPersonal.php" method="post" enctype="multipart/form-data" id="agregarPersonalForm">
                        <input type="text" name= "nombreprofesor" id="nombreprofesor" placeholder="Nombre del profesor">
                        <div class="input-field col s12">
                            <select id="puesto" name="puesto">
                                <option value="Profesor">Profesor</option>
                                <option value="Jefe_de_departamento">Jefe de departamento</option>
                                <option value="Presidente_de_academia">Presidente de academia</option>
                                <option value="Secretario_de_academia">Secretario de academia</option>
                                <option value="Coordinador_de_carrera">coordinador de carrera</option>
                                <option value="Coordinador_de_programa_de_tutorias">coordinador de programa de tutorias</option>
                                <option value="Jefe_de_proyecto_de_docencia">Jefe de proyecto de docencia</option>
                                <option value="Jefe_de_proyecto_de_vinculacion">Jefe de proyecto de vinculaci&oacuten</option>
                                <option value="Jefe_de_proyecto_de_investigacion">Jefe de proyecto de investigaci&oacuten</option>
                            </select>
                            <label>Puesto</label>
                        </div>
                        <div class="input-field col s12">
                            <select id="carrera" name="carrera">
                                <option value="mecanica">Mecánica</option>
                                <option value="mecatronica">Mecatrónica</option>
                                <option value="materiales">Materiales</option>
                            </select>
                            <label>Carrera</label>
                        </div>
                        <br>
                        <label for="archivo">Seleccione una foto para subir</label>  
                        <br>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto</span>
                                <input type="file" accept="image/jpeg" name="archivoFoto" id="archivoFoto">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <label for="archivo">Seleccione un archivo para subir</label>  
                        <br>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Curriculum</span>
                                <input type="file" accept="application/pdf" name="archivo" id="archivo">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                            <i class="material-icons right">save</i>
                        </button>
                    </form>
                </div>
                <!-- SECCION PARA EDITAR A LOS PROFESORES -->
                <div id="modificar" class = "col s12">
                    <h1>Modificar Personal</h1>
                    <form action="editarPersonal.php" method="post" enctype="multipart/form-data" id="editarPersonalForm">
                        <div class="input-field col s12">
                            <select id="nombreprofesorEditar" class="nombreprofesorEditar" name="nombreprofesorEditar">
                                <!-- <option value="disable" disabled selected>Elija un profesor</option> -->
                                <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT nombre FROM profesor";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                                ?>
                                <option value="<?=$fila[0]?>"><?=$fila[0]?></option>  
                                <?php
                                }
                                ?>
                            </select>
                            <label>Profesor</label>
                        </div>
                        <div class="input-field col s12">
                            <select id="puestoeditar" name="puestoeditar">
                                <option value="Profesor">Profesor</option>
                                <option value="Jefe_de_departamento">Jefe de departamento</option>
                                <option value="presidente_de_academia">Presidente de academia</option>
                                <option value="secretario_de_academia">Secretario de academia</option>
                                <option value="coordinador_de_carrera">coordinador de carrera</option>
                                <option value="coordinador_de_programa_de-tutorias">coordinador de programa de tutorias</option>
                                <option value="Jefe_de_proyecto_de_docencia">Jefe de proyecto de docencia</option>
                                <option value="Jefe_de_proyecto_de_vinculacion">Jefe de proyecto de vinculaci&oacuten</option>
                                <option value="Jefe_de_proyecto_de_investigacion">Jefe de proyecto de investigaci&oacuten</option>
                            </select>
                            <label>Puesto</label>
                        </div>
                        <div class="input-field col s12">
                            <select id="carreraeditar" name="carreraeditar">
                            <option value="mecanica">Mecánica</option>
                                <option value="mecatronica">Mecatrónica</option>
                                <option value="materiales">Materiales</option>
                            </select>
                            <label>Carrera</label>
                        </div>
                        <label for="archivo">Seleccione una foto para subir</label>  
                        <br>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto</span>
                                <input type="file" accept="image/*" name="archivoFotoe" id="archivoFotoe">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <label for="archivo">Seleccione un archivo para subir</label>  
                        <br>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>File</span>
                                <input type="file" accept="application/pdf" name="archivoe" id="archivoe">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Editar
                            <i class="material-icons right">system_update_alt</i>
                        </button>
                    </form>
                </div>
                <!-- SECCION PARA ELIMINAR A LOS PROFESORES -->
                <div id="eliminar" class = "col s12">
                    <h1>Eliminar Personal</h1>
                    <form action="EliminarPersonal.php" method="post" enctype="multipart/form-data" id="eliminarPersonalForm">
                        <div class="input-field col s12">
                            <select id="eliminarp" name="eliminarp">
                                <option value="x" disabled selected>Elija un profesor</option>
                                <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT nombre FROM profesor";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                                ?>
                                <option value="<?=$fila[0]?>"><?=$fila[0]?></option>  
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