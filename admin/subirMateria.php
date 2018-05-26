<?php
    session_start();
    require_once("DB.php");
    if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
        foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
        }

        extract($_POST);
        if(isset($nombremateria)){
            if($nombremateria!=""){
                $targetfolder = "ProgramasMaterias/";
                $targetfolder = $targetfolder . basename( $_FILES['archivo']['name']) ;
                if(move_uploaded_file($_FILES['archivo']['tmp_name'], $targetfolder)) {
                    //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
                } else {
                    //echo "Problem uploading file";
                }
                $archivo = $targetfolder;
                $conexion = new DB();
                $resultado = $conexion->insertarMateria($nombremateria, $creditosmateria, $tipomateria, $semestremateria, $carrera, $abreviacionmateria, $archivo);
                if($resultado>0){
                    $_SESSION['result'] = 'guardado';
                    header('Location: reticula_admin.php');
                } else {
                    $_SESSION['result'] = 'error';
                    header('Location: reticula_admin.php');
                }
            }
        }   
    } else {
        header('Location: reticula_admin.php');
        $_SESSION['result'] = 'error';
    }
?>