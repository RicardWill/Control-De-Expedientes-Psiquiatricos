<?php 

    session_start();

    if(!isset($_SESSION['tipo_usuario'])){
        header("Location: login.php");
    }

    $tipo_usuario = $_SESSION['tipo_usuario'];

    header("Content-Type: application/xls");

    header("Content-Disposition: attachment; filename= doc.xls");

    
?>

<table>
                                    
                                        <tr>
                                            <th>ID</th>
                                            <th>EDAD</th>
                                            <th>SEXO</th>
                                            <th>ESTUDIOS</th>
                                            <th>ESTADO CIVIL</th>
                                            <th>OCUPACION</th>
                                            <th>TIPO USUARIO</th>
                                            <th>CONTRASEÑA</th>
                                        </tr>

    <?php
        include("../connect/conexion.php");


        if($tipo_usuario == 1){

            $where = "";
    
        }else if($tipo_usuario == 2){
    
            $where = "WHERE tipo_usuario='$tipo_usuario'";
    
        }
        //
    
        $sql = "SELECT * FROM persona $where";
        $ejecutar=mysqli_query($mysqli, $sql);
        while($row=mysqli_fetch_array($ejecutar)){
    
    ?>


                                   

                                        <tr>
                                            <td><?php echo $row['id_persona'];?></td>
                                            <td><?php echo $row['edad'];?></td>
                                            <td><?php echo $row['sexo'];?></td>
                                            <td><?php echo $row['estudios'];?></td>
                                            <td><?php echo $row['estado_civil'];?></td>
                                            <td><?php echo $row['ocupacion'];?></td>
                                            <td><?php echo $row['tipo_usuario'];?></td>
                                            <td><?php echo $row['password_usuario'];?></td>
                                        </tr>
                                        
                                        <?php 
                                        } ?>

                                        
                                </table>