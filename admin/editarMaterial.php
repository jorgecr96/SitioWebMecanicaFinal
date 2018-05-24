<?php
session_start();
require_once("DB.php");
header('Content-type: application/json');
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    if( (isset($_FILES['materialEditar']) && $_FILES['materialEditar']['error'] != 4)){ 
        //echo "llegue al primer if donde ambos archivos existen\n"; 
        //se debe cambiar toda la información del profesor
        //asignar las rutas para guardar los archivos de foto(png, jpg, etc) y CV (pdf)
        $targetarchivo = "material/";
        $ruta= "";
        $targetarchivo = $targetarchivo . basename( $_FILES['materialEditar']['name']);
        if(move_uploaded_file($_FILES['materialEditar']['tmp_name'], $targetarchivo)){
            //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
        }
        else {
            $response_array['result'] = 'errorDoc';
            echo json_encode($response_array);
            exit;
        }
        $archivo = $targetarchivo;
        //Eliminar el archivo viejo de CV y foto
        $conexion = new DB();
        $oldArchivo = $conexion->ejecutar("SELECT ruta FROM material_apoyo WHERE nombre='".$tituloMaterial."'");
        foreach($oldArchivo as $fila){
            $ruta = $fila[0];
        }
        echo($ruta);
        unlink($ruta);
        $ruta= "";
        echo $_FILES['materialEditar']['name'];
        $resultado = $conexion->editarMaterial($tituloMaterial,$tituloMaterialEditar,"material/".$_FILES['materialEditar']['name'],$seccionMaterialEditar);
        if($resultado>0){
            $response_array['status'] = 'success';
            echo json_encode($response_array);
            $_SESSION['result']='editadoMaterial';
           header('Location: alta_material.php');
            exit;
        }
        else{
            $response_array['status'] = 'errorMaterial';
            echo json_encode($response_array);
            $_SESSION['result']='errorMaterial';
            header('Location: alta_material.php');
            exit;
        }
    }
    else{
        //el usuario no ingresó ningun archivo por lo que solo se modificará el nombre, descripcion y url
        //echo "llegue al ultimo if donde no hay archivos";
        $conexion = new DB();
        $resultado = $conexion->editarMaterialSinArchivo($tituloMaterial,$tituloMaterialEditar,$seccionMaterialEditar);
        if($resultado>0){
            $response_array['status'] = 'success';
            echo json_encode($response_array);
            $_SESSION['result']='editadoMaterial';
            header('Location: alta_material.php');
            exit;
        }
        else{
            $response_array['status'] = 'errorMaterial';
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
