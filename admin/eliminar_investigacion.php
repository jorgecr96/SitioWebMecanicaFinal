<?php
require_once("DB.php");
session_start();
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    //falta eliminar el archivo
    if($tituloInvestigacion!=""){
        $conexion = new DB();
        $resultado = $conexion->eliminarInvestigacion($tituloInvestigacion);
        if($resultado>0){
            $ruta ="";
            $doc = $conexion->ejecutar("SELECT archivo FROM investigaciones WHERE titulo='".$tituloInvestigacion."'");
            foreach($doc as $fila){
                $ruta = $fila[0];
            }
            unlink($ruta);
            $ruta="";
            $_SESSION['result'] = 'eliminadoMaterial';
            header('Location: adminInvesigacion.php');
        }
        else{
            $_SESSION['result'] = 'errorMaterial';
            header('Location: adminInvesigacion.php');
        }
    }   
}
else{
    echo "se genero un error";
}
?>