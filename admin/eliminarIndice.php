<?php
    session_start();
    require_once("DB.php");
    if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
        foreach($_POST as $indice => $valor){
            $_POST[$indice] = htmlspecialchars($valor);
        }
        extract($_POST);
        //falta eliminar el archivo
        if($indiceEliminar!=""){
            $conexion = new DB();
            list($carreraeliminar,$periodoeliminar,$fechaeliminar)=explode('_', $indiceEliminar);
            $ruta = "Indices/".$carreraeliminar."/".$periodoeliminar."_".$fechaeliminar.".pdf";
            unlink($ruta);
            $resultado = $conexion->eliminarIndice($carreraeliminar, $periodoeliminar, $fechaeliminar);
            if($resultado>0){
                $_SESSION['result'] = 'eliminado';
                header('Location: indices_admin.php');        
            } else {
                $_SESSION['result'] = 'error';
                header('Location: indices_admin.php');        
            }
        }   
    } else {
        echo "se genero un error";
    }
?>