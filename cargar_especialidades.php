<?php
session_start();
require_once("admin/DB.php");
header('Content-type: application/json');
$conexion = new DB();
$resultado = $conexion->mostEspecialidades($_SESSION['carrera']);
?>
<script type="text/javascript">
    $(document).ready(function(){
        $('.tabs').tabs();
    });            
</script>
<div class="row">
    <div class="col s12">
        <ul class="tabs">
<?php
foreach ($resultado as $row){
    $especialidad = str_replace(" ", "_", $row['Nombre']);
?>
            <li class="tab col s3"><a href="#<?php echo $especialidad; ?>"><?php echo $especialidad; ?></a></li>
<?php
}
?>
        </ul>
    </div>
    <?php
        foreach($resultado as $row){
            $especialidad = str_replace(" ", "_", $row['Nombre']);
            //fin php
            //    <div id="<?php echo $row['Nombre']" class="col s12">
            //        
            //    </div>
            // inicio?>
            <div id='<?php echo $especialidad; ?>' class="col s12">
                <div id="especialidad_<?php echo $especialidad;?>">
                    <script type="text/javascript">
                        $("#especialidad_<?php echo $especialidad;?>").load("cargar_reticula.php?e=<?php echo $especialidad;?>");
                    </script>    
               </div>
            </div>
            <?php
        }
    ?>
</div>