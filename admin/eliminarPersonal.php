<?php
require_once("DB.php");
session_start();
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }

    extract($_POST);
    //falta eliminar el archivo
                if($eliminarp!=""){
                    $conexion = new DB();
                    $ruta ="";
                    $file = $conexion->ejecutar("SELECT CV FROM Profesor WHERE nombre='".$eliminarp."'");
                    foreach($file as $fila){
                        $ruta = $fila[0];
                        //echo $fila[0];
                    }
                    //echo $ruta;
                    //echo "unlinked";
                    unlink($ruta);
                    $ruta = "";
                    $foto = $conexion->ejecutar("SELECT foto FROM Profesor WHERE nombre='".$eliminarp."'");
                    foreach($foto as $fila){
                        $ruta = $fila[0];
                        //echo $fila[0];
                    }
                    unlink($ruta);
                    $resultado = $conexion->eliminarProfesor($eliminarp);
                    if($resultado>0){
                        
                        $_SESSION['result'] = 'eliminado';
                        header('Location: prueba_admin.php');
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