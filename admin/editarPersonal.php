<?php
session_start();
require_once("DB.php");
header('Content-type: application/json');
if(isset($_POST) and $_SERVER["REQUEST_METHOD"]=="POST"){
    
    foreach($_POST as $indice => $valor){
        $_POST[$indice] = htmlspecialchars($valor);
    }

    extract($_POST);
    
    if( (isset($_FILES['archivoe']) && $_FILES['archivoe']['error'] != 4) && (isset($_FILES['archivoFotoe']) && $_FILES['archivoFotoe']['error'] != 4)  ) { 
        //echo "llegue al primer if donde ambos archivos existen\n"; 
        //se debe cambiar toda la información del profesor
        //asignar las rutas para guardar los archivos de foto(png, jpg, etc) y CV (pdf)
        $targetfolder = "CV/";
        $targetfoto = "foto/";
        $ruta= "";
        $targetfolder = $targetfolder . basename( $_FILES['archivoe']['name']);
        $targetfoto = $targetfoto . basename( $_FILES['archivoFotoe']['name']);
       if(move_uploaded_file($_FILES['archivoe']['tmp_name'], $targetfolder))
        {
            //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
        }
        else {
            $response_array['status'] = 'errorArchivo';
            echo json_encode($response_array);
            exit;
        }
        if(move_uploaded_file($_FILES['archivoFotoe']['tmp_name'], $targetfoto))
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
        $archivo = $targetfolder;
        $foto = $targetfoto;
        //Eliminar el archivo viejo de CV y foto
        $conexion = new DB();
        $oldCV = $conexion->ejecutar("SELECT CV FROM Profesor WHERE nombre='".$nombreprofesorEditar."'");
        foreach($oldCV as $fila){
            $ruta = $fila[0];
        }
        unlink($ruta);
        $ruta= "";
        $oldPhoto = $conexion->ejecutar("SELECT foto FROM Profesor WHERE nombre='".$nombreprofesorEditar."'");
        foreach($oldPhoto as $fila){
        $ruta = $fila[0];
            }
        unlink($ruta);
        $ruta= "";
        $resultado = $conexion->editarProfesor($nombreprofesorEditar, $puestoeditar, $carreraeditar, $archivo, $foto);
        if($resultado>0){
            $response_array['status'] = 'success';
            echo json_encode($response_array);
            $_SESSION['result']='editado';
            header('Location: prueba_admin.php');
            exit;
        }
        else{
            $response_array['status'] = 'errorConsulta';
            echo json_encode($response_array);
            $_SESSION['result']='error';
            header('Location: prueba_admin.php');
            exit;
        }
    }
    else{
                
        if( (isset($_FILES['archivoe']) && $_FILES['archivoe']['error'] != 4) && ( isset($_FILES['archivoFotoe']) && $_FILES['archivoFotoe']['error'] == 4)  ) { 
            //echo "llegue al segudno if donde solo el cv existe";
            //se debe cambiar toda la información del profesor
            //asignar las rutas para guardar los archivos de foto(png, jpg, etc) y CV (pdf)
            $targetfolder = "CV/";
            $targetfolder = $targetfolder . basename( $_FILES['archivoe']['name']) ;
            if(move_uploaded_file($_FILES['archivoe']['tmp_name'], $targetfolder))
            {
                //echo "The file ". basename( $_FILES['archivo']['name']). " is uploaded";
            }
            else {
                $response_array['status'] = 'errorArchivo';
                echo json_encode($response_array);
                $_SESSION['result']='error';
                header('Location: prueba_admin.php');
                exit;
                }
            $archivo = $targetfolder;
            //Eliminar el archivo viejo de CV y foto
            $conexion = new DB();
            $ruta= "";
            $oldCV = $conexion->ejecutar("SELECT CV FROM Profesor WHERE nombre='".$nombreprofesorEditar."'");
            foreach($oldCV as $fila){
                $ruta = $fila[0];
            }
            unlink($ruta);
            $ruta= "";
            $resultado = $conexion->editarProfesorCV($nombreprofesorEditar, $puestoeditar, $carreraeditar, $archivo);
            if($resultado>0){
                $response_array['status'] = 'success';
                echo json_encode($response_array);
                $_SESSION['result']='editado';
                header('Location: prueba_admin.php');
            }
            else{
                $response_array['status'] = 'errorConsulta';
                echo json_encode($response_array);
                $_SESSION['result']='error';
                header('Location: prueba_admin.php');
            }
            //$_SESSION['result'] = 'editado';
        }
        else {
            if( (isset($_FILES['archivoe']) && $_FILES['archivoe']['error'] == 4) && (isset($_FILES['archivoFotoe']) && $_FILES['archivoFotoe']['error'] != 4)  ) { 
                //echo "llegue al tercer if donde solo la foto existe";
                //asignar las rutas para guardar los archivos de foto(png, jpg, etc)
                $targetfoto = "foto/";
                $targetfoto = $targetfoto . basename( $_FILES['archivoFotoe']['name']) ;
                if(move_uploaded_file($_FILES['archivoFotoe']['tmp_name'], $targetfoto))
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
                $foto = $targetfoto;
                //Eliminar el archivo viejo de CV y foto
                $conexion = new DB();
                $ruta= "";
                $oldPhoto = $conexion->ejecutar("SELECT foto FROM Profesor WHERE nombre='".$nombreprofesorEditar."'");
                foreach($oldPhoto as $fila){
                    $ruta = $fila[0];
                    //echo $fila[0];
                }
                unlink($ruta);
                //se editará el puesto, carrera y foto
                $resultado = $conexion->editarProfesorFoto($nombreprofesorEditar, $puestoeditar, $carreraeditar, $foto);
                if($resultado>0){
                    $response_array['status'] = 'success';
                    echo json_encode($response_array);
                    $_SESSION['result']='editado';
                    header('Location: prueba_admin.php');
                    exit;
                }
                else{
                    $response_array['status'] = 'errorConsulta';
                    echo json_encode($response_array);
                    $_SESSION['result']='error';
                    header('Location: prueba_admin.php');
                    exit;
                }

            }
            else{
                //el usuario no ingresó ningun archivo por lo que solo se modificará el puesto y carrera
                //echo "llegue al ultimo if donde no hay archivos";
                $conexion = new DB();
                $resultado = $conexion->editarProfesorPuesto($nombreprofesorEditar, $puestoeditar, $carreraeditar); 
                if($resultado>0){
                    $response_array['status'] = 'success';
                    echo json_encode($response_array);
                    $_SESSION['result']='editado';
                    header('Location: prueba_admin.php');
                }
                else{
                    $response_array['status'] = 'errorConsulta';
                    echo json_encode($response_array);
                    $_SESSION['result']='error';
                    header('Location: prueba_admin.php');
                }
            }
        }
    }   
}
else{
    echo "se genero un error";
}
?>
