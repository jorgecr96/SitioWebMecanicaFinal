<?php
session_start();
require_once("DB.php");
header('Content-type: application/json');
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    if(isset($tituloInvestigacion)){
        if($tituloInvestigacion!=""){
            //agregar archivos al sitioWeb
            $targetdoc = "investigacion/";
            $targetdoc = $targetdoc . basename( $_FILES['archivoInvestigacion']['name']) ;
            if(move_uploaded_file($_FILES['archivoInvestigacion']['tmp_name'], $targetdoc)){
                //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
            }
            else {
                $_SESSION['result']='errorDoc';
                header('Location: adminInvestigacion.php');
            }
            $ruta = $targetdoc;
            $conexion = new DB();
            $resultado = $conexion->insertarInvestigacion($tituloInvestigacion, $ruta, $descripcionInvestigacion);
            
            //$_SESSION['result'] = 'guardado';
            if($resultado>0){
                $_SESSION['result']='guardado';
                header('Location: adminInvestigacion.php');
            }
            else{
                $_SESSION['result']='errorInvestigacion';
                header('Location: adminInvestigacion.php');
            }  
        }

    }
}else{
    echo "se genero un error";
}
?>