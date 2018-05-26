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
        $ruta ="";
        $doc = $conexion->ejecutar("SELECT archivo FROM investigaciones WHERE titulo='".$tituloInvestigacion."'");
        
            $ruta ="";
            foreach($doc as $fila){
                $ruta = $fila[0];
            }
            unlink($ruta);
            $resultado = $conexion->eliminarInvestigacion($tituloInvestigacion);
            if($resultado>0){
            
            $_SESSION['result'] = 'eliminadoMaterial';
            header('Location: adminInvestigacion.php');
        }
        else{
            $_SESSION['result'] = 'errorMaterial';
            header('Location: adminInvestigacion.php');
        }
    }   
}
else{
    echo "se genero un error";
}
?>