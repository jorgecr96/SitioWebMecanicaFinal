<?php
    session_start();
    require_once("DB.php");
    if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
        foreach($_POST as $indice => $valor){
            $_POST[$indice] = htmlspecialchars($valor);
        }
        extract($_POST);
        if(isset($_FILES['archivoeditar'])){
            $targetfolder = "ProgramasMaterias/";
            $targetfolder = $targetfolder . basename( $_FILES['archivoeditar']['name']);;
            //echo $targetfolder;
           if(move_uploaded_file($_FILES['archivoeditar']['tmp_name'], $targetfolder)){
                //echo "The file ". basename( $_FILES['archivoeditar']['name']). " is uploaded";
            } else {
                //echo "Problem uploading file";
            }
            $archivoeditar = $targetfolder;
            $conexion = new DB();
            //$file = $conexion->obtenerArchivo($nombremateriaeditar);
            //unlink($file['ProgramasMaterias']);
            $resultado = $conexion->editarMateria($nombremateriaeditar, $creditosmateriaeditar, $tipomateriaeditar, $semestremateriaeditar, $carreraeditar, $abreviacionmateriaeditar,$archivoeditar);
            //echo $resultado;
            if($resultado>0){
                header('Location: reticula_admin.php');
                $_SESSION['result'] = 'editado';
            } else {
                header('Location: reticula_admin.php');
                $_SESSION['result'] = 'error';
            }
        } else {
            //En caso de no estar el archivo, solo se cambiará el resto de los datos
            $conexion = new DB();
            $resultado = $conexion->editarMateriaElse($nombremateriaeditar, $creditosmateriaeditar, $tipomateriaeditar, $semestremateriaeditar, $carreraeditar, $abreviacionmateriaeditar);
            //echo $resultado;
            if($resultado>0){
                header('Location: reticula_admin.php');
                $_SESSION['result'] = 'editado';
            } else {
                header('Location: reticula_admin.php');
                $_SESSION['result'] = 'error';
            }
        }   
    } else {
        echo "se genero un error";
    }
?>
