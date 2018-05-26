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
        <!--encabezado y menus-->
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
        <!-- SECCION PARA AGREGAR MTERIAL DE APOYO-->
        <div class="Cprincipal_index card-panel grey lighten-4">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#alta" class="teal-text text-darken-2">AGREGAR MATERIAL</a></li>
                        <li class="tab col s3"><a href="#modificar" class="teal-text text-darken-2">MODIFICAR MATERIAL</a></li>
                        <li class="tab col s3"><a href="#baja" class="teal-text text-darken-2">ELIMINAR MATERIAL</a></li>
                    </ul>
                </div>
                <div id='alta' class="col s12">
                    <h1>Agregar Material/Documento</h1>
                    <br />
                    <form action="subirMaterial.php" method="post" enctype="multipart/form-data" id="agregarMaterialForm">
                        <input type="text" name= "tituloMaterial" id="tituloMaterial" placeholder="Titulo del documento (para mostrar en pantalla)">
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Elige el documento</span>
                                <input type="file" accept="application/pdf, application/vnd.ms-excel, application/vnd.ms-word" name="archivoMaterial" id="archivoMaterial">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Nombre orginal del documento">
                            </div>
                        </div>
                        <div class="input-field  ">
                            <label>Sección</label><br>
                            <select id="seccionMaterial" name="seccionMaterial">
                                <option value="" disabled selected>Selecciona una sección</option>
                                <option value="Documentos">Documentos</option>
                                <option value="Normativos">Normativos</option>
                                <option value="Reglamento">Reglamento</option>
                                <option value="Materias">Materias</option>
                                <option value="Ceneval">Ceneval</option>
                                <option value="Tríptico">Tríptico</option>
                            </select>
                        </div>
                        <br />
                        <button class="btn waves-effect waves-light" type="submit" name="action">Guardar
                            <i class="material-icons right">save</i>
                        </button>
                    </form>
                </div>
                <div id='modificar' class="col s12">
                    <h1>Editar Material</h1>
                    <br />
                    <form action="editarMaterial.php" method="post" enctype="multipart/form-data" id="editarMaterialForm">
                        <div class="input-field col s12">
                            <label>Documento</label><br>
                            <select id="tituloMaterial" name="tituloMaterial">
                                <option value="" disabled selected>Selecciona el documento a editar</option>
                                <?php
                                    //Conexion a la base de datos
                                    require_once("DB.php");
                                    $db = new DB();
                                    $SQL = "SELECT nombre FROM material_apoyo";
                                    $resultado = $db->ejecutar($SQL);
                                    foreach($resultado as $fila){
                                        $json= json_decode($fila[0]);
                                ?>
                                <option value="<?php echo $fila[0]; ?>"><?php echo $fila[0];  } ?></option>                                    
                            </select>
                        </div>   
                        <br />
                         <label>Nuevo nombre del documento a mostrar</label>
                        <input type="text" name= "tituloMaterialEditar" id="tituloMaterialEditar" placeholder="Titulo del documento (para mostrar en pantalla)">
                        
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Elige el nuevo documento</span>
                                <input type="file" accept="application/pdf, application/vnd.ms-excel, application/vnd.ms-word" name="materialEditar" id="materialEditar">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text" placeholder="Nombre del documento">
                            </div>
                        </div>
                        <div class="input-field col s12 ">
                            <label>Editar Sección</label><br>
                            <select id="seccionMaterialEditar" name="seccionMaterialEditar">
                                <option value="" disabled selected>Selecciona una sección</option>
                                <option value="Documentos">Documentos</option>
                                <option value="Normativos">Normativos</option>
                                <option value="Reglamento">Reglamento</option>
                                <option value="Materias">Materias</option>
                                <option value="Ceneval">Ceneval</option>
                                <option value="Tríptico">Tríptico</option>
                            </select>
                        </div>
                        <button class="btn waves-effect waves-light" type="submit" name="action">Editar
                            <i class="material-icons right">system_update_alt</i>
                        </button>
                    </form>
                </div>
                <div id='baja' class="col s12">
                    <h1>Eliminar Material de Apoyo</h1>
                    <form action="eliminar_material.php" method="post" enctype="multipart/form-data" id="eliminarMaterialForm">
                        <div class="input-field col s12">
                            <label>Eliminar</label><br>
                            <select id="tituloMaterial" name="tituloMaterial">
                                <option value="" disabled selected>Selecciona un documento</option>
                                <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT nombre FROM material_apoyo";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                                ?>
                                    <option value="<?php echo $fila[0]; ?>"><?php echo $fila[0]; } ?></option>  
                                    
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