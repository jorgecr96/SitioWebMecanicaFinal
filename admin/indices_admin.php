<?php
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
        <meta name="author" content="Kevin Erick Angel Medrano"/>
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
                        <li class="tab col s3"><a href="#alta" class="teal-text text-darken-2">AGREGAR INDICE</a></li>
                        <li class="tab col s3"><a href="#eliminar" class="teal-text text-darken-2">ELIMINAR INDICE</a></li>
                    </ul>
                </div>
                <!-- SECCION PARA AGREGAR LOS INDICES DE REPROBACION -->
                <div id="alta" class = "col s12">
                    <h1>Agregar Índice</h1>
                    <form action="subirIndice.php" method="post" enctype="multipart/form-data" id="agregarIndiceForm">
                        <div class="input-field col s12">
                            <select id="carrera" name="carrera">
                                <option value="Mecanica">Mecánica</option>
                                <option value="Mecatronica">Mecatrónica</option>
                                <option value="Materiales">Materiales</option>
                            </select>
                            <label>Carrera</label>
                        </div>
                        <div class="input-field col s12">
                            <select id="periodo" name="periodo">
                                <option value="ENE-JUN">ENERO-JUNIO</option>
                                <option value="AGO-DIC">AGOSTO-DICIEMBRE</option>
                            </select>
                            <label>Periodo</label>
                        </div>
                        <div class="input-field col s12">
                            <select id="fecha" name="fecha">
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>
                                <option value="2035">2035</option>
                                <option value="2036">2036</option>
                                <option value="2037">2037</option>
                                <option value="2038">2038</option>
                                <option value="2039">2039</option>
                                <option value="2040">2040</option>
                                <option value="2041">2041</option>
                                <option value="2042">2042</option>
                                <option value="2043">2043</option>
                                <option value="2044">2044</option>
                                <option value="2045">2045</option>
                            </select>
                            <label>Año</label>
                        </div>
                        <label for="archivo">Seleccione un archivo para subir</label>  
                        <br>
                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Índice</span>
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
                <!-- SECCION PARA ELIMINAR INDICES DE REPROBACION -->
                <div id='eliminar' class="col s12">
                    <h1>Eliminar Índice</h1>
                    <form action="eliminarIndice.php" method="post" enctype="multipart/form-data" id="eliminarIndiceForm">
                        <select id="inidiceEliminar" name="indiceEliminar">
                            <option value="" disabled selected>Selecciona el indice a eliminar</option>
                            <?php
                                //Conexion a la base de datos
                                require_once("DB.php");
                                $db = new DB();
                                $SQL = "SELECT * FROM indices";
                                $resultado = $db->ejecutar($SQL);
                                foreach($resultado as $fila){
                                    $json= json_decode($fila[0]);
                            ?>
                                <option value="<?php echo $fila[1]."_".$fila[2]."_".$fila[3]; ?>"><?php echo $fila[1]."_".$fila[2]."_".$fila[3];?></option>
                            <?php
                                }
                            ?>                                    
                        </select>
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