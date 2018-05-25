<?php
session_start();
require_once("DB.php");
header('Content-type: application/json');
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    if( (isset($_FILES['investigacionEditar']) && $_FILES['investigacionEditar']['error'] != 4)){ 
        //echo "llegue al primer if donde ambos archivos existen\n"; 
        //se debe cambiar toda la información del profesor
        //asignar las rutas para guardar los archivos de foto(png, jpg, etc) y CV (pdf)
        $targetarchivo = "investigacion/";
        $ruta= "";
        $targetarchivo = $targetarchivo . basename( $_FILES['investigacionEditar']['name']);
        if(move_uploaded_file($_FILES['investigacionEditar']['tmp_name'], $targetarchivo)){
            //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
        }
        else {
            $response_array['result'] = 'errorDoc';
            echo json_encode($response_array);
            $_SESSION['result']='errorDoc';
            header('Location: adminInvestigacion.php');
            exit;
        }
        $archivo = $targetarchivo;
        //Eliminar el archivo viejo de CV y foto
        $conexion = new DB();
        $resultado = $conexion->editarInvestigacion($tituloInvestigacion,$tituloInvestigacionEditar,"investigacion/".$_FILES['investigacionEditar']['name'],$descripcionInvestigacionEditar);
        if($resultado>0){
            $oldArchivo = $conexion->ejecutar("SELECT archivo FROM investigaciones WHERE titulo='".$tituloInvestigacion."'");
            foreach($oldArchivo as $fila){
                $ruta = $fila[0];
            }
            echo($ruta);
            unlink($ruta);
            $ruta= "";
            $response_array['status'] = 'success';
            echo json_encode($response_array);
            $_SESSION['result']='editadoMaterial';
            header('Location: adminInvestigacion.php');
            exit;
        }
        else{
            $response_array['status'] = 'errorMaterial';
            echo json_encode($response_array);
            $_SESSION['result']='errorMaterial';
            header('Location: adminInvestigacion.php');
            exit;
        }
    }
    else{
        //el usuario no ingresó ningun archivo por lo que solo se modificará el nombre, descripcion y url
        //echo "llegue al ultimo if donde no hay archivos";
        $conexion = new DB();
        $resultado = $conexion->editarInvestigacionSinArchivo($tituloInvestigacion,$tituloInvestigacionEditar,$descripcionInvestigacionEditar);
        if($resultado>0){
            $response_array['status'] = 'success';
            echo json_encode($response_array);
            $_SESSION['result']='editadoMaterial';
            header('Location: adminInvestigacion.php');
            exit;
        }
        else{
            $response_array['status'] = 'errorMaterial';
            echo json_encode($response_array);
            $_SESSION['result']='errorMaterial';
            header('Location: adminInvestigacion.php');
            exit;
        }
    }  
}
else{
    echo "se genero un error";
}
?>

