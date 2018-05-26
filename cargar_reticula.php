<?php
session_start();
require_once("admin/DB.php");
header('Content-type: application/json');
$conexion = new DB();
$resultado = $conexion->mostReticula($_SESSION['carrera'],$_GET['e']);
?>
<div id="wrapper">
    <table class="centered hide-on-med-and-down">
        <thead>
            <tr>
                <th>Semestre 1</th>
                <th>Semestre 2</th>
                <th>Semestre 3</th>
                <th>Semestre 4</th>
                <th>Semestre 5</th>
                <th>Semestre 6</th>
                <th>Semestre 7</th>
                <th>Semestre 8</th>
                <th>Semestre 9</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                   <div>
                        <div class="row">
                            <table class="centered hide-on-med-and-down">
                                <tbody>
                                    <?php
                                        foreach($resultado as $row){
                                            if($row['semestre']==1){
                                    ?>
                                    <tr>
                                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                                    </tr>
                                    <?php  
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </td>
                <td>
                   <div>
                        <div class="row">
                            <table class="centered hide-on-med-and-down">
                                <tbody>
                                <?php
                                        foreach($resultado as $row){
                                            if($row['semestre']==2){
                                    ?>
                                    <tr>
                                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                                    </tr>
                                    <?php  
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </td>
                <td>
                   <div>
                        <div class="row">
                            <table class="centered hide-on-med-and-down">
                                <tbody>
                                    <?php
                                        foreach($resultado as $row){
                                            if($row['semestre']==3){
                                    ?>
                                    <tr>
                                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                                    </tr>
                                    <?php  
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </td>
                <td>
                   <div>
                        <div class="row">
                            <table class="centered hide-on-med-and-down">
                                <tbody>
                                    <?php
                                        foreach($resultado as $row){
                                            if($row['semestre']==4){
                                    ?>
                                    <tr>
                                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                                    </tr>
                                    <?php  
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </td>
                <td>
                   <div>
                        <div class="row">
                            <table class="centered hide-on-med-and-down">
                                <tbody>
                                <?php
                                        foreach($resultado as $row){
                                            if($row['semestre']==5){
                                    ?>
                                    <tr>
                                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                                    </tr>
                                    <?php  
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </td>
                <td>
                   <div>
                        <div class="row">
                            <table class="centered hide-on-med-and-down">
                                <tbody>
                                <?php
                                        foreach($resultado as $row){
                                            if($row['semestre']==6){
                                    ?>
                                    <tr>
                                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                                    </tr>
                                    <?php  
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </td>
                <td>
                   <div>
                        <div class="row">
                            <table class="centered hide-on-med-and-down">
                                <tbody>
                                <?php
                                        foreach($resultado as $row){
                                            if($row['semestre']==7){
                                    ?>
                                    <tr>
                                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                                    </tr>
                                    <?php  
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </td>
                <td>
                   <div>
                        <div class="row">
                            <table class="centered hide-on-med-and-down">
                                <tbody>
                                <?php
                                        foreach($resultado as $row){
                                            if($row['semestre']==8){
                                    ?>
                                    <tr>
                                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                                    </tr>
                                    <?php  
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </td>
                <td>
                   <div>
                        <div class="row">
                            <table class="centered hide-on-med-and-down">
                                <tbody>
                                    <?php
                                        foreach($resultado as $row){
                                            if($row['semestre']==9){
                                    ?>
                                    <tr>
                                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                                    </tr>
                                    <?php  
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </td>
            </tr>
        </tbody>
    </table>
    <div class="row hide-on-large-only">
        <table class="centered">
            <thead>
                <tr>
                    <th> </th>
                    <th>Semestre 1</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $cont=0;
                        foreach($resultado as $row){
                            if($cont==3){
                                ?>
                                </tr><tr>
                                <?php
                            }
                            if($row['semestre']==1){
                    ?>
                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                    <?php 
                            $cont=$cont+1; 
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
        <table class="centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Semestre 2</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $cont=0;
                        foreach($resultado as $row){
                            if($cont==3){
                                ?>
                                </tr><tr>
                                <?php
                            }
                            if($row['semestre']==2){
                    ?>
                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                    <?php 
                            $cont=$cont+1; 
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
        <table class="centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Semestre 3</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $cont=0;
                        foreach($resultado as $row){
                            if($cont==3){
                                ?>
                                </tr><tr>
                                <?php
                            }
                            if($row['semestre']==3){
                    ?>
                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                    <?php 
                            $cont=$cont+1; 
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
        <table class="centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Semestre 4</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $cont=0;
                        foreach($resultado as $row){
                            if($cont==3){
                                ?>
                                </tr><tr>
                                <?php
                            }
                            if($row['semestre']==4){
                    ?>
                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                    <?php 
                            $cont=$cont+1; 
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
        <table class="centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Semestre 5</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $cont=0;
                        foreach($resultado as $row){
                            if($cont==3){
                                ?>
                                </tr><tr>
                                <?php
                            }
                            if($row['semestre']==5){
                    ?>
                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                    <?php 
                            $cont=$cont+1; 
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
        <table class="centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Semestre 6</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $cont=0;
                        foreach($resultado as $row){
                            if($cont==3){
                                ?>
                                </tr><tr>
                                <?php
                            }
                            if($row['semestre']==6){
                    ?>
                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                    <?php 
                            $cont=$cont+1; 
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
        <table class="centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Semestre 7</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                        $cont=0;
                        foreach($resultado as $row){
                            if($cont==3){
                                ?>
                                </tr><tr>
                                <?php
                            }
                            if($row['semestre']==7){
                    ?>
                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                    <?php 
                            $cont=$cont+1; 
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
        <table class="centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Semestre 8</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $cont=0;
                        foreach($resultado as $row){
                            if($cont==3){
                                ?>
                                </tr><tr>
                                <?php
                            }
                            if($row['semestre']==8){
                    ?>
                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                    <?php 
                            $cont=$cont+1; 
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
        <table class="centered">
            <thead>
                <tr>
                    <th></th>
                    <th>Semestre 9</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                        $cont=0;
                        foreach($resultado as $row){
                            if($cont==3){
                                ?>
                                </tr><tr>
                                <?php
                            }
                            if($row['semestre']==9){
                    ?>
                        <td><div class="waves-effect centered waves-light white-text orange darken-3"><div><a class="btn-large  orange darken-2 flow-text"  href=<?php echo 'admin/'.$row['programa'].'' ?>><h6><?php echo $row['abreviacion']; ?></h6></a></div><br />Creditos:<?php echo $row['creditos']; ?><br />Tipo: <?php echo $row['tipo']?><br /></div></td>
                    <?php 
                            $cont=$cont+1; 
                            }
                        }
                    ?>
                </tr>
            </tbody>
        </table>
    </div>
</div>