<?php
require_once("DB.php");
session_start();
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    //falta eliminar el archivo
    if($tituloNoticia!=""){
        $conexion = new DB();
        $ruta ="";
        $foto = $conexion->ejecutar("SELECT imagen FROM noticias WHERE titulo='".$tituloNoticia."'");
        foreach($foto as $fila){
            $ruta = $fila[0];
        }
        unlink($ruta);
        $resultado = $conexion->eliminarNoticia($tituloNoticia);
        if($resultado>0){
            $_SESSION['result'] = 'eliminado';
            header('Location: alta_noticias.php');
        }
        else{
            $_SESSION['result'] = 'error';
            header('Location: alta_noticias.php');
        }
    }   
}
else{
    echo "se genero un error";
}
?>