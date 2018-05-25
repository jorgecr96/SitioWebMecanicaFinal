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
            if(isset($_SESSION['resutl'])){
                if($_SESSION['result'] == 'guardado'){
                    echo '<script>alert("Noticia guardada exitosamente!");</script>';
                    //echo "<nav><div class=\"nav-wrapper light-green accent-4\"><H2>Guardado exitosamente</H2></div></nav>";
                }
                if($_SESSION['result'] == 'editado'){
                    echo '<script>alert("Noticia editada exitosamente!");</script>';
                }
                if($_SESSION['result'] == 'eliminado'){
                    echo '<script>alert("Noticia eliminada exitosamente!");</script>';
                }
                if($_SESSION['result'] == 'error'){
                    echo '<script>alert("Error, vuelva a intentarlo más tarde!");</script>';
                }
                if($_SESSION['result'] == 'errorFoto'){
                    echo '<script>alert("Error al cargar la foto, selecciona otra o vuelva a intentarlo más tarde!");</script>';
                }
                $_SESSION['result']= "";
            }
        ?>
        <!-- SECCION PARA AGREGAR NOTICIAS-->
        <div class="Cprincipal_index card-panel grey lighten-4">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#alta" class="teal-text text-darken-2">AGREGAR NOTICIA</a></li>
                        <li class="tab col s3"><a href="#modificar" class="teal-text text-darken-2">MODIFICAR NOTICIA</a></li>
                        <li class="tab col s3"><a href="#baja" class="teal-text text-darken-2">BAJA NOTICIA</a></li>
                    </ul>
                </div>
                <div id='alta' class="col s12">
                    <h1>Agregar Noticia</h1>
                    <form action="subirNoticia.php" method="post" enctype="multipart/form-data" id="agregarNoticiaForm">
                        <input type="text" name= "tituloNoticia" id="tituloNoticia" placeholder="Titulo de la noticia">
                        <input type="text" name= "descripcion" id="descripcion" placeholder="Descripción de la noticia">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto</span>
                                <input type="file" accept="image/jpeg" name="archivoFoto" id="archivoFoto">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Image de la noticia">
                            </div>
                        </div>
                        <input type="text" name="url" id="url" placeholder="URL de la noticia completa">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                            <i class="material-icons right">save</i>
                        </button>
                    </form>
                </div>
                <div id='modificar' class="col s12">
                    <h1>Editar Noticias</h1>
                    <form action="editarNoticia.php" method="post" enctype="multipart/form-data" id="editarNoticiasForm">
                        <div class="input-field col s12">
                            <label>Noticia</label><br>
                            <select id="tituloNoticia" name="tituloNoticia">
                                <option value="" disabled selected>Selecciona una noticia</option>
                                <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT titulo FROM noticias";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                                ?>
                                    <option value="<?php echo $fila[0]?>"><?php echo $fila[0]?></option>  
                                <?php
                                }
                                ?>
                            </select>
                            <br>
                        </div>
                        <input type="text" name= "descripcionEditar" id="descripcionEditar" placeholder="Descripción de la noticia">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto</span>
                                <input type="file" accept="image/jpeg" name="archivoFotoEditar" id="archivoFotoEditar">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Image de la noticia">
                            </div>
                        </div>
                        <input type="text" name="urlEditar" id="urlEditar" placeholder="URL de la noticia completa">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Editar
                            <i class="material-icons right">system_update_alt</i>
                        </button>
                    </form>
                </div>
                <div id='baja' class="col s12">
                    <h1>Eliminar Noticias</h1>
                    <form action="eliminarNoticia.php" method="post" enctype="multipart/form-data" id="eliminarNoticiasForm">
                        <div class="input-field col s12">
                            <label>Eliminar</label><br>
                            <select id="tituloNoticia" name="tituloNoticia">
                                <option value="" disabled selected>Selecciona una noticia</option>
                                <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT titulo FROM noticias";
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