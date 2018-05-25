<?php
require_once("DB.php");
session_start();
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }

    extract($_POST);
    //falta eliminar el archivo
                if($nombreu!="" && $pass!=""){
                    $conexion = new DB();
                    $resultado = $conexion->crearUsuario($nombreu, $pass);
                    if($resultado>0){
                        $_SESSION['result'] = 'guardado';
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