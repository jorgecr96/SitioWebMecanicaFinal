<?php
session_start();
require_once("DB.php");
header('Content-type: application/json');
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }

    extract($_POST);
                if($nomesp!=""){
                    $conexion = new DB();
                    $resultado = $conexion->agregarEspecialidad($nomesp, $carrera);
                    if($resultado>0){  
                        $response_array['status'] = 'success';
                        echo json_encode($response_array);
                        $_SESSION['result']='guardado';
                        header("Location: admin_especialidad.php");
                        exit;
                    }
                    else{
                        $response_array['status'] = 'error';
                        echo json_encode($response_array);
                        $_SESSION['result']='error';
                        header("Location: admin_especialidad.php");
                        exit;
                    }
            }   
}
else{
    echo "se genero un error";
}
?>