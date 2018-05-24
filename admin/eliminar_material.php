<?php
require_once("DB.php");
session_start();
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    //falta eliminar el archivo
    if($tituloMaterial!=""){
        $conexion = new DB();
        $ruta ="";
        $doc = $conexion->ejecutar("SELECT nombre FROM material_apoyo WHERE nombre='".$tituloMaterial."'");
        foreach($doc as $fila){
            $ruta = $fila[0];
        }
        unlink($ruta);
        $resultado = $conexion->eliminarMaterial($tituloMaterial);
        if($resultado>0){
            $_SESSION['result'] = 'eliminadoMaterial';
            header('Location: alta_material.php');
        }
        else{
            $_SESSION['result'] = 'errorMaterial';
            header('Location: alta_material.php');
        }
    }   
}
else{
    echo "se genero un error";
}
?>