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
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    if(isset($_SESSION['result'])){
        if($_SESSION['result'] == 'guardado'){
            echo '<script>swal("GUARDADO", "Materia guardado exitosamente!", "success");</script>';
            //echo "<nav><div class=\"nav-wrapper light-green accent-4\"><H2>Guardado exitosamente</H2></div></nav>";
        }
        if($_SESSION['result'] == 'editado'){
            echo '<script>swal("EDITADO", "Materia editado exitosamente!","success");</script>';
        }
        if($_SESSION['result'] == 'eliminado'){
            echo '<script>swal("ELIMINADO","Materia eliminado exitosamente!","success");</script>';
        }
        if($_SESSION['result'] == 'error'){
            echo '<script>swal("ERROR","Error, vuelva a intentarlo más tarde!","error");</script>';
        }
    $_SESSION['result']= "";}
        ?>
        <div class="Cprincipal_index card-panel grey lighten-4">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#alta" class="teal-text text-darken-2">AGREGAR USUARIO</a></li>
                        <li class="tab col s3"><a href="#modificar" class="teal-text text-darken-2">MODIFICAR USUARIO</a></li>
                        <li class="tab col s3"><a href="#eliminar" class="teal-text text-darken-2">ELIMINAR USUARIO</a></li>
                    </ul>
                </div>
                <!-- SECCION PARA AGREGAR A LOS PROFESORES -->
                <div id="alta" class = "col s12">
                    <h1>Agregar usuario</h1>
                    <form action="agregarUsuario.php" method="post" enctype="multipart/form-data" id="agregarUsuarioForm">
                        <input type="text" name= "nombreu" id="nombreu" placeholder="Nombre del usuario">
                        <br>
                        <input type="text" name= "pass" type="password" id="pass" placeholder="Contraseña">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                            <i class="material-icons right">save</i>
                        </button>
                    </form>
                </div>
                <!-- SECCION PARA EDITAR A LOS PROFESORES -->
                <div id="modificar" class = "col s12">
                    <h1>Modificar Personal</h1>
                    <form action="editarUsuario.php" method="post" enctype="multipart/form-data" id="editarUsuarioForm">
                        <div class="input-field col s12">
                            <select id="nombreueditar" class="nombreueditar" name="nombreueditar">
                                <!-- <option value="disable" disabled selected>Elija un profesor</option> -->
                                <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT nombre FROM usuarios";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                                ?>
                                <option value="<?=$fila[0]?>"><?=$fila[0]?></option>  
                                <?php
                                }
                                ?>
                            </select>
                            <input type="text" name= "passeditar" type="passeditar" id="pass" placeholder="Contraseña">
                            <label>Usuario</label>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Editar
                            <i class="material-icons right">system_update_alt</i>
                        </button>
                    </form>
                </div>
                <!-- SECCION PARA ELIMINAR A LOS PROFESORES -->
                <div id="eliminar" class = "col s12">
                    <h1>Eliminar Personal</h1>
                    <form action="eliminarUsuario.php" method="post" enctype="multipart/form-data" id="eliminarUsuarioForm">
                        <div class="input-field col s12">
                            <select id="eliminaru" name="eliminaru">
                                <option value="x" disabled selected>Elija un usuario</option>
                                <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT nombre FROM usuarios";
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