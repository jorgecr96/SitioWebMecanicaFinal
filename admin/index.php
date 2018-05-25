<!DOCTYPE html>
<html lang="es">
    <head>
        <title>ITMORELIA| Dept. Metal-Mec�nica</title>
        <meta charset="utf-8"/>
        <meta name="keywords" content="pagina de Mecanica"/>
        <meta name="author" content="Kevin Erick Angel MEdrano"/>
        <link rel="icon" type="image/ico" href="Imagenes/icotec.ico"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
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
    <body >
        <nav>
            <div class="nav-wrapper grey darken-1">
                <a href="#" data-activates="slide-out" class="button-collapse hide-on-large-only left"><i class="material-icons">menu</i></a>
                <a href="#" class="brand-logo center"><h5>Metal Mecánica</h5></a>
            </div>
        </nav>
        <div class="Cprincipal_index lighten-4" style="text-align:center; margin-top: 10%; margin-bottom: 10%; margin-left: 25%; margin-right: 25%;">
            <form action="Login.php" method="post" enctype="multipart/form-data" class="datos_usuarios" id="indexLogInForm">
                <button class="btn waves-effect waves-light" type="submit" name="action">Iniciar Sesion
                    <i class="material-icons right">send</i>
                </button>
            </form>
        </div>
        <!--Pie de pagina, datos de contato-->
        <div id="feet" class="feet">
            <script type="text/javascript">
                $("#feet").load("footer.html");
            </script> 
        </div>
    </body>
</html> 