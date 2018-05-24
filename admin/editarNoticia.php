<?php
session_start();
require_once("DB.php");
header('Content-type: application/json');
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    if( (isset($_FILES['archivoFotoEditar']) && $_FILES['archivoFotoEditar']['error'] != 4)){ 
        $targetfoto = "noticias/";
        $ruta= "";
        $targetfoto = $targetfoto . basename( $_FILES['archivoFotoEditar']['name']);
        if(move_uploaded_file($_FILES['archivoFotoEditar']['tmp_name'], $targetfoto)){
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
        //Eliminar el archivo viejo de CV y foto
        $conexion = new DB();
        $oldPhoto = $conexion->ejecutar("SELECT imagen FROM noticias WHERE titulo='".$tituloNoticia."'");
        foreach($oldPhoto as $fila){
            $ruta = $fila[0];
        }
        unlink($ruta);
        $ruta= "";
        $resultado = $conexion->editarNoticia($tituloNoticia,$descripcionEditar,$foto,$urlEditar);
        if($resultado>0){
            $response_array['status'] = 'success';
            echo json_encode($response_array);
            $_SESSION['result']='editado';
            header('Location: alta_noticias.php');
            exit;
        }
        else{
            $response_array['status'] = 'errorConsulta';
            echo json_encode($response_array);
            $_SESSION['result']='error';
            header('Location: alta_noticias.php');
            exit;
        }
    }
    else{
        //el usuario no ingresó ningun archivo por lo que solo se modificará el nombre, descripcion y url
        //echo "llegue al ultimo if donde no hay archivos";
        $conexion = new DB();
        $resultado = $conexion->editarNoticiaSinFoto($tituloNoticia,$descripcionEditar, $urlEditar); 
        if($resultado>0){
            $response_array['status'] = 'success';
            echo json_encode($response_array);
            $_SESSION['result']='editado';
            header('Location: alta_noticias.php');
        }
        else{
            $response_array['status'] = 'errorConsulta';
            echo json_encode($response_array);
            $_SESSION['result']='error';
            header('Location: alta_noticias.php');
        }
    }  
}
else{
    echo "se genero un error";
}
?>
