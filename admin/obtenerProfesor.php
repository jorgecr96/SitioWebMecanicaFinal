<?php
    require_once("DB.php");
    $conexion = new DB();
    $resultado = $conexion->ejecutar("SELECT nombre FROM profesor;");
    echo json_encode($resultado);
?>