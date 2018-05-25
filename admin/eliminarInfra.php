<?php
require_once("DB.php");
session_start();
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    if($tituloInfra!=""){
        $conexion = new DB();
        $ruta ="";
        $foto = $conexion->ejecutar("SELECT foto FROM infraestructura WHERE nombre='".$tituloInfra."'");
        foreach($foto as $fila){
            $ruta = $fila[0];
        }
        unlink($ruta);
        $resultado = $conexion->eliminarInfraestructura($tituloInfra);
        if($resultado>0){
            $_SESSION['result'] = 'eliminado';
            header('Location: admin_infraestructura.php');
        }
        else{
            $_SESSION['result'] = 'error';
            header('Location: admin_infraestructura.php');
        }
    }   
}
else{
    echo "se genero un error";
}
?>