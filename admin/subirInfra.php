<?php
require_once("DB.php");
header('Content-type: application/json');
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }
    extract($_POST);
    if($tituloInfra!=""){
        //agregar archivos al sitioWeb
        $targetfoto = "Infraestructura/";
        $targetfoto = $targetfoto . basename( $_FILES['archivoFoto']['name']) ;
        if(move_uploaded_file($_FILES['archivoFoto']['tmp_name'], $targetfoto)){
        }
        else {
            $response_array['status'] = 'errorFoto';
            echo json_encode($response_array);
            $_SESSION['result']='errorFoto';
            header('Location: admin_infraestructura.php');
            exit;
        }
        $foto = $targetfoto;
        $conexion = new DB();
        $resultado = $conexion->insertarInfraestructura($tituloInfra, $descripcion, $foto);
        session_start();
        //$_SESSION['result'] = 'guardado';
        if($resultado>0){
            $response_array['status'] = 'success';
            echo json_encode($response_array);
            $_SESSION['result']='guardado';
            header('Location: admin_infraestructura.php');
        }
        else{
            $response_array['status'] = 'errorConsulta';
            echo json_encode($response_array);
            $_SESSION['result']='error';
            header('Location: admin_infraestructura.php');
            exit;
        }  
    }
}
else{
    echo "se genero un error";
}
?>