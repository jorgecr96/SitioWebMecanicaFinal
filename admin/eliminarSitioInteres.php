<?php
require_once("DB.php");
session_start();
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }

    extract($_POST);
    //falta eliminar el archivo
                if($eliminaru!=""){
                    $conexion = new DB();
                    $ruta ="";
                    $file = $conexion->ejecutar("SELECT imagen FROM sitio_interes WHERE nombre='".$eliminaru."'");
                    foreach($file as $fila){
                        $ruta = $fila[0];
                        //echo $fila[0];
                    }
                    //echo $ruta;
                    //echo "unlinked";
                    unlink($ruta);
                    $resultado = $conexion->eliminarSitioInteres($eliminaru);
                    if($resultado>0){
                        
                        $_SESSION['result'] = 'eliminado';
                        header('Location: adminSitioInteres.php');
                    }
                    else{
                        $_SESSION['result'] = 'error';
                        echo "Error de consulta";
                    }
            }   
}
else{
    echo "se genero un error";
}
?>