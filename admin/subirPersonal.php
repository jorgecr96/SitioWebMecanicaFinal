<?php
require_once("DB.php");
header('Content-type: application/json');
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }

    extract($_POST);
                if($nombreprofesor!=""){
                    
                    //agregar archivos al sitioWeb
                    $targetfolder = "CV/";
                    $targetfoto = "foto/";
                    $targetfolder = $targetfolder . basename( $_FILES['archivo']['name']) ;
                    $targetfoto = $targetfoto . basename( $_FILES['archivoFoto']['name']) ;
                   if(move_uploaded_file($_FILES['archivo']['tmp_name'], $targetfolder))
                    {
                        //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
                    }
                    else {
                        $response_array['status'] = 'errorArchivo';
                        echo json_encode($response_array);
                        exit;
                         
                    }
                    if ( isset( $_FILES["archivoFoto"] ) && !empty( $_FILES["archivoFoto"]["name"] ) ) {
                        if ( is_uploaded_file( $_FILES["archivoFoto"]["tmp_name"] ) && $_FILES["archivoFoto"]["error"] === 0 )
                        if(move_uploaded_file($_FILES['archivoFoto']['tmp_name'], $targetfoto))
                        {
                            //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
                        }
                        else {
                            $response_array['status'] = 'errorFoto';
                            echo json_encode($response_array);
                            $_SESSION['result']='error';
                            header('Location: prueba_admin.php');
                            exit;
                        }
                    }
                    else{
                        $targetfoto = "foto/default.jpg";
                    }   
                    $archivo = $targetfolder;
                    $foto = $targetfoto;
                    $conexion = new DB();
                    $resultado = $conexion->insertarProfesor($nombreprofesor, $puesto, $carrera, $archivo, $foto);
                    session_start();
                    //$_SESSION['result'] = 'guardado';
                    if($resultado>0){
                        $response_array['status'] = 'success';
                        echo json_encode($response_array);
                        $_SESSION['result']='guardado';
                        header('Location: prueba_admin.php');
                    }
                    else{
                        $response_array['status'] = 'errorConsulta';
                        echo json_encode($response_array);
                        $_SESSION['result']='error';
                        header('Location: prueba_admin.php');
                        exit;
                    }
            }   
}
else{
    
    echo "se genero un error";
}
?>
