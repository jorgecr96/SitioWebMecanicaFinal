<?php 
    session_start();
    if(isset($_SESSION['result'])){
        if($_SESSION['result'] == 'guardado'){
            echo '<script>alert("Guardado exitosamente!");</script>';
        }
        if($_SESSION['result'] == 'editado'){
            echo '<script>alert("Editado exitosamente!");</script>';
        }
        if($_SESSION['result'] == 'eliminado'){
            echo '<script>alert("Eliminado exitosamente!");</script>';
        }
        if($_SESSION['result'] == 'error'){
            echo '<script>alert("Error, vuelva a intentarlo");</script>';
        }
        $_SESSION['result']= "";
    }
?>
<!DOCTYPE html>
<!-- Artesania y loza Mexicana -->
<html lang="es">
    <head>
        <title>ITMORELIA| Dept. Metal-Mec�nica</title>
        <meta charset="utf-8"/>
        <meta name="author" content="Kevin Erick Angel Medrano"/>
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
        <script>
            $(document).ready(function() {
                $('select').material_select();
                $(".button-collapse").sideNav();
                $('.tabs').tabs();
            });
        </script>
    </head>
    <body>
        <!--ENCABEZADO Y MENU-->
        <?php
            $doc = new DOMDocument();
            libxml_use_internal_errors(true);
            $doc->loadHTMLFile("navbar.html");
            echo $doc->saveHTML();
        ?>
        <?php 
            if($_SESSION['result'] == 'guardado'){
                echo '<script>alert("Materia guardada exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'editado'){
                echo '<script>alert("Materia editada exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'eliminado'){
                echo '<script>alert("Materia eliminada exitosamente!");</script>';
            }
            if($_SESSION['result'] == 'error'){
                echo '<script>alert("Error, vuelva a intentarlo");</script>';
            }
            $_SESSION['result']= "";
        ?>
        <div class="Cprincipal_index card-panel grey lighten-4">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a href="#alta" class="teal-text text-darken-2">AGREGAR MATERIA</a></li>
                        <li class="tab col s3"><a href="#modificar" class="teal-text text-darken-2">Modificar MATERIA</a></li>
                        <li class="tab col s3"><a href="#eliminar" class="teal-text text-darken-2">ELIMINAR MATERIA</a></li>
                    </ul>
                </div>    
                <!-- SECCION PARA AGREGAR LAS MATERIAS -->    
                <div id="alta" class = "col s12">
                    <h1>Agregar Materia</h1>
                    <form action="subirMateria.php" method="post" enctype="multipart/form-data" id="agregarMateriaForm">
                        <input type="text" name= "nombremateria" id="nombremateria" placeholder="Nombre de la materia">
                        <input type="number"  min="0" max="11" default="1" name= "creditosmateria" id="creditosmateria" placeholder="Creditos de la materia">
                        <select id="tipomateria" name="tipomateria">
                            <?php
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT Nombre FROM especialidad";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                                    $especialidad = str_replace(" ", "_", $fila['Nombre']);
                            ?>
                            <option value="<?php echo $especialidad; ?>"><?php echo $especialidad;?></option>  
                            <?php
                                }
                            ?>
                        </select>
                        <input type="number"  min="1" max="12" default="1" name= "semestremateria" id="semestremateria" placeholder="Semestre de la materia">
                        <div class="input-field col s12">
                            <select id="carrera" name="carrera">
                                <option value="mecanica">Mecánica</option>
                                <option value="mecatronica">Mecatrónica</option>
                                <option value="mecatronica">Materiales</option>
                            </select>
                            <label>Carrera</label>
                        </div>
                        <input type="text" name= "abreviacionmateria" id="abreviacionmateria" placeholder="Abreviación de la materia">
                        <label for="archivo">Seleccione un archivo para subir</label>  
                        <br>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Programa</span>
                                <input type="file"  accept="application/pdf" name="archivo" id="archivo">
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
                <!-- SECCION PARA EDITAR LAS MATERIAS -->
                <div id="modificar" class = "col s12">
                    <h1>Modificar Materias</h1>
                    <form action="editarMateria.php" method="post" enctype="multipart/form-data" id="editarMateriaForm">
                        <div class="input-field col s12">
                            <select id="nombremateriaeditar" class="nombremateriaeditar" name="nombremateriaeditar">
                                <?php
                                    require_once("DB.php");
                                    $db = new DB();
                                    $SQL = "SELECT materia FROM materias";
                                    $resultado = $db->ejecutar($SQL);
                                    foreach($resultado as $fila){
                                        $json= json_decode($fila[0]);
                                ?>
                                <option value="<?=$fila[0]?>"><?=$fila[0]?></option>  
                                <?php
                                    }
                                ?>
                            </select>
                            <label>Materias</label>
                        </div>
                        <input type="number"  min="0" max="11" name= "creditosmateriaeditar" id="creditosmateriaeditar" placeholder="Creditos de la materia">
                        <input type="text" name= "tipomateriaeditar" id="tipomateriaeditar" placeholder="Tipo de la materia">
                        <input type="number"  min="1" max="12" name= "semestremateriaeditar" id="semestremateriaeditar" placeholder="Semestre de la materia">
                        <div class="input-field col s12">
                            <select id="carreraeditar" name="carreraeditar">
                                <option value="mecanica">Mecánica</option>
                                <option value="mecatronica">Mecatrónica</option>
                                <option value="mecatronica">Materiales</option>
                            </select>
                            <label>Carrera</label>
                        </div>
                        <input type="text" name= "abreviacionmateriaeditar" id="abreviacionmateriaeditar" placeholder="Abreviación de la materia">
                        <label for="archivo">Seleccione un archivo para subir</label>  
                        <br>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Programa</span>
                                <input type="file"  accept="application/pdf" name="archivoeditar" id="archivoeditar">
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
                <!-- SECCION PARA ELIMINAR LAS MATERIAS -->
                <div id="eliminar" class = "col s12">
                    <h1>Eliminar Materias</h1>
                    <form action="eliminarMateria.php" method="post" enctype="multipart/form-data" id="eliminarMateriaForm">
                        <div class="input-field col s12">
                            <select id="eliminarmateria" name="eliminarmateria">
                                <option value="x" disabled selected>Elija una materia</option>
                                <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT materia FROM materias";
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