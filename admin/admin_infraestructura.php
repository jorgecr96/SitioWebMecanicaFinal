<?php 
#inicio de sesión para variables de verificación 
    session_start();
    if($_SESSION['user']!=""){
        //echo "Bienvenido ".$_SESSION['user'];
    }
    else{
        header('Location: login.php');
    }
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>ITMORELIA| Dept. Metal-Mecánica</title>
        <meta charset="utf-8"/>
        <meta name="keywords" content="pagina de Mecanica"/>
        <meta name="author" content="Kevin Erick Angel Medrano"/>
        <link rel="icon" type="image/ico" href="Imagenes/icotec.ico"/>      
        <meta name = "viewport" content = "width = device-width, initial-scale = 1">      
        <link rel = "stylesheet" href = "https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
        <script type = "text/javascript" src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>           
        <script type="text/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>
        <link rel="stylesheet" type="text/css" href="index.css" />
        <link rel="stylesheet" type="text/css" href="estilo.css" />
        <style type="text/css">
            body{
                background: #dddddd;
                background-repeat: no-repeat;
                background-position: center center;
                background-attachment: fixed;
           }
        </style> 
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".button-collapse").sideNav();
                $('.tabs').tabs();
            });
        </script>
    </head>
    <body>
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
                echo '<script>alert("Foto guardada exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'eliminado'){
                echo '<script>alert("Foto eliminada exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'error'){
                echo '<script>alert("Error, vuelva a intentarlo más tarde!");</script>';
            }
            if($_SESSION['result'] == 'errorFoto'){
                echo '<script>alert("Error al cargar la foto, selecciona otra o vuelva a intentarlo más tarde!");</script>';
            }
            $_SESSION['result']= "";
        ?>
        <div class="Cprincipal_index card-panel grey lighten-4">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#alta" class="teal-text text-darken-2">AGREGAR IMAGEN</a></li>
                        <li class="tab col s3"><a href="#baja" class="teal-text text-darken-2">ELIMINAR IMAGEN</a></li>
                    </ul>
                </div>
                 <!-- SECCION PARA AGREGAR FOTOS-->
                <div id='alta' class="col s12">
                    <h1>Agregar Imagen</h1>
                    <form action="subirInfra.php" method="post" enctype="multipart/form-data" id="agregarInfraForm">
                        <input type="text" name= "tituloInfra" id="tituloInfra" placeholder="Titulo de la imagen">
                        <input type="text" name= "descripcion" id="descripcion" placeholder="Descripción de la imagen">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Imagen</span>
                                <input type="file" accept="image/jpeg" name="infraFoto" id="infraFoto">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Imagen">
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                            <i class="material-icons right">save</i>
                        </button>
                    </form>
                </div>
                 <!-- SECCION PARA ELIMINAR FOTOS-->
                <div id='baja' class="col s12">
                    <h1>Eliminar Imagen</h1>
                    <form action="eliminarInfra.php" method="post" enctype="multipart/form-data" id="eliminarInfraForm">
                        <div class="input-field col s12">
                            <label>Eliminar</label><br>
                            <select id="tituloInfra" name="tituloInfra">
                                <option value="" disabled selected>Selecciona una Imagen</option>
                                <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT nombre FROM infraestructura";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                                ?>
                                    <option value="<?php echo $fila[0]?>"><?php echo $fila[0]?></option>  
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