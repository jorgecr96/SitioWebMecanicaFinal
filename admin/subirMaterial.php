<?php
session_start();
require_once("DB.php");
header('Content-type: application/json');
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    if($tituloMaterial!=""){
        //agregar archivos al sitioWeb
        $targetdoc = "material/";
        $targetdoc = $targetdoc . basename( $_FILES['archivoMaterial']['name']) ;
        if(move_uploaded_file($_FILES['archivoMaterial']['tmp_name'], $targetdoc)){
            //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
        }
        else {
            $response_array['status'] = 'errorMaterial';
            echo json_encode($response_array);
            $_SESSION['result']='errorMaterial';
            header('Location: alta_material.php');
            exit;
        }
        $ruta = $targetdoc;
        $conexion = new DB();
        $resultado = $conexion->insertarMaterial( $seccionMaterial, $tituloMaterial, $ruta);
        //$_SESSION['result'] = 'guardado';
        if($resultado>0){
            $_SESSION['result']='guardado';
            header('Location: alta_material.php');
        }
        else{
            $response_array['status'] = 'errorConsulta';
            echo json_encode($response_array);
            $_SESSION['result']='errorMaterial';
            header('Location: alta_material.php');
            exit;
        }  
    }
}
else{
    echo "se genero un error";
}
?>