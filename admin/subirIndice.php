<?php
    session_start();
    require_once("DB.php");
    if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
        foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
        }
        extract($_POST);
        if(isset($carrera)){
            session_start();
            $targetfolder = "Indices/".$carrera."/";
            //$targetfolder = $targetfolder.basename( $_FILES['archivo']['name']) ;
            $newname = $periodo."_" .$fecha.".pdf";
            $file = $targetfolder."".$newname;
            if(move_uploaded_file($_FILES['archivo']['tmp_name'], $file)) {
                //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
            } else {
                //echo "Problem uploading file";
            }
            $archivo = $targetfolder;
            $conexion = new DB();
            $resultado = $conexion->insertarIndice($carrera, $periodo, $fecha);
            if($resultado>0){
                header('Location: indices_admin.php');
                $_SESSION['result'] = 'guardado';
            } else {
                header('Location: indices_admin.php');
                $_SESSION['result'] = 'error';
            }
        }   
    } else {
        echo "Se generó un error";
    }
?>