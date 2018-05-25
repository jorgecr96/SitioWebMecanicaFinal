<?php
    class BD{
        function __construct(){
            try {
                //incluir variables de conexion
                //require_once("datos_conexion.php");
                //echo var_dump($datos_conexion);
                $usuario = 'root';
                $pass = '12345678';
                $this->conexion = new PDO('mysql:host=127.0.0.1;dbname=mecanica', $usuario, $pass);
                //echo "Conexion exitosa";
            }catch(PDOException $e){
                die("Error al conectarse:". $e->getMessage());
            }    
        }
    
        public function ejecutar($sql){
            if($this->conexion){
                return $this->conexion->query($sql)->fetchAll();
            }else{
                return null;
            }
        }
    }
?>