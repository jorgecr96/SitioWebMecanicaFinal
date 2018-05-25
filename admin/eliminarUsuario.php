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
                    $resultado = $conexion->eliminarUsuario($eliminaru);
                    if($resultado>0){
                        $_SESSION['result'] = 'eliminado';
                        header('Location: adminUsuarios.php');
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