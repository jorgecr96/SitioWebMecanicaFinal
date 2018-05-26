<?php
session_start();
require_once("DB.php");
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){

    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }

    extract($_POST);
                if($nombresitio!=""){
                    //echo "despues del  if";
                    //agregar archivos al sitioWeb
                    $targetfoto = "Interes/";
                    $targetfoto = $targetfoto . basename( $_FILES['archivoFoto']['name']) ;
                        
                        if(move_uploaded_file($_FILES['archivoFoto']['tmp_name'], $targetfoto))
                        {
                            //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
                        }
                        else {
                            $_SESSION['result']='error';
                            header('Location: adminSitiosInteres.php'); 
                        }  
                        

                    $archivo = $targetfoto;
                    $conexion = new DB();
                    $resultado = $conexion->insertarSitioInteres($nombresitio, $enlace, $targetfoto);
                    //$_SESSION['result'] = 'guardado';
                    if($resultado>0){
                        $_SESSION['result']='guardado';
                        header('Location: adminSitiosInteres.php');
                    }
                    else{
                        $_SESSION['result']='error';
                        header('Location: adminSitiosInteres.php');
                    }
            }   
}
else{
    
    echo "se genero un error";
}
?>
