<?php
session_start();
require_once("DB.php");
header('Content-type: application/json');
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    if($tituloNoticia!=""){
        //agregar archivos al sitioWeb
        $targetfoto = "noticias/";
        $targetfoto = $targetfoto . basename( $_FILES['archivoFoto']['name']) ;
        if(move_uploaded_file($_FILES['archivoFoto']['tmp_name'], $targetfoto)){
            //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
        }
        else {
            $response_array['status'] = 'errorFoto';
            echo json_encode($response_array);
            $_SESSION['result']='errorFoto';
            header('Location: alta_noticias.php');
            exit;
        }
        $foto = $targetfoto;
        $conexion = new DB();
        $resultado = $conexion->insertarNoticia($tituloNoticia, $descripcion, $foto, $url);
        //$_SESSION['result'] = 'guardado';
        if($resultado>0){
            $_SESSION['result']='guardado';
            header('Location: alta_noticias.php');
        }
        else{
            $response_array['status'] = 'errorConsulta';
            echo json_encode($response_array);
            $_SESSION['result']='error';
            header('Location: alta_noticias.php');
            exit;
        }  
    }
}
else{
    echo "se genero un error";
}
?>