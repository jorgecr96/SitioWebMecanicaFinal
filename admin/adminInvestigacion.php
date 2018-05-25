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
        <!--encabezado y menus-->
        <?php
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTMLFile("navbar.html");
            echo $doc->saveHTML();
        ?>
        <?php 
            #condiciones para veerificiar que las peticiones fueron aceptadas o rechazadas
            if($_SESSION['result'] == 'guardado'){
                echo '<script>alert("Investigación guardada exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'editadoMaterial'){
                echo '<script>alert("Investigación editada exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'eliminadoMaterial'){
                echo '<script>alert("Investigación eliminada exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'errorMaterial'){
                echo '<script>alert("Error, vuelva a intentarlo más tarde!");</script>';
            }
            if($_SESSION['result'] == 'errorDoc'){
                echo '<script>alert("Error al cargar el documento, selecciona otro o vuelva a intentarlo más tarde!");</script>';
            }
            $_SESSION['result']= "";
        ?>
        <!-- SECCION PARA AGREGAR MTERIAL DE APOYO-->
        <div class="Cprincipal_index card-panel grey lighten-4">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#alta" class="teal-text text-darken-2">AGREGAR INVESTIGACIÓN</a></li>
                        <li class="tab col s3"><a href="#modificar" class="teal-text text-darken-2">MODIFICAR INVESTIGACIÓN</a></li>
                        <li class="tab col s3"><a href="#baja" class="teal-text text-darken-2">ELIMINAR INVESTIGACIÓN</a></li>
                    </ul>
                </div>
                <div id='alta' class="col s12">
                    <h1>Agregar Investigación</h1>
                    <br />
                    <form action="subirInvestigacion.php" method="post" enctype="multipart/form-data" id="agregarInvestigacionForm">
                        <input type="text" name= "tituloInvestigacion" id="tituloInvestigacion" placeholder="Titulo de la investigación (para mostrar en pantalla)">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Elige el documento</span>
                                <input type="file" accept="application/pdf, application/vnd.ms-excel, application/vnd.ms-word" name="archivoInvestigacion" id="archivoInvestigacion">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Nombre orginal del documento">
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="descripcionInvestigacion" name="descripcionInvestigacion" class="materialize-textarea"></textarea>
                            <label for="descricionInvestigacion">Descripcion de la Investigación</label>
                        </div>
                        <br />
                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                            <i class="material-icons right">save</i>
                        </button>
                    </form>
                </div>
                <div id='modificar' class="col s12">
                    <h1>Editar Investigación</h1>
                    <br />
                    <form action="editarInvestigacion.php" method="post" enctype="multipart/form-data" id="editarInvestigacionForm">
                        <div class="input-field col s12">
                            <label>Investigación</label><br>
                            <select id="tituloInvestigacion" name="tituloInvestigacion">
                                <option value="" disabled selected>Selecciona el documento a editar</option>
                            <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT titulo FROM investigaciones";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                            ?>
                                <option value="<?php echo $fila[0]; ?>"><?php echo $fila[0];?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>   
                        <br />
                        <label>Nuevo nombre de la investigación a mostrar</label>
                        <input type="text" name= "tituloInvestigacionEditar" id="tituloInvestigacionEditar" placeholder="Titulo de la investigacion (para mostrar en pantalla)">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Elige el nuevo documento</span>
                                <input type="file" accept="application/pdf, application/vnd.ms-excel, application/vnd.ms-word" name="investigacionEditar" id="investigacionEditar">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Nombre del documento">
                            </div>
                        </div>
                        <div class="input-field col s12">
                            <textarea id="descripcionInvestigacionEditar" name="descripcionInvestigacionEditar" class="materialize-textarea"></textarea>
                            <label for="descricionInvestigacionEditar">Descripcion de la Investigación</label>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Editar
                            <i class="material-icons right">system_update_alt</i>
                        </button>
                    </form>
                </div>
                <div id='baja' class="col s12">
                    <h1>Eliminar Investigacion</h1>
                    <form action="eliminar_investigacion.php" method="post" enctype="multipart/form-data" id="eliminarInvestigacionForm">
                        <div class="input-field col s12">
                            <label>Investigación</label><br>
                            <select id="tituloInvestigacion" name="tituloInvestigacion">
                                <option value="" disabled selected>Selecciona una Investigación</option>
                            <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT titulo FROM investigaciones";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                            ?>
                                <option value="<?php echo $fila[0]; ?>"><?php echo $fila[0];?></option>
                            <?php
                                }
                            ?>
                            </select>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Eliminar
                            <i class="material-icons right">delete_forever</i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html> 