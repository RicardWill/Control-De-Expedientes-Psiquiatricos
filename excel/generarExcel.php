<?php 
    header("Content-Type: application/xls");

    header("Content-Disposition: attachment; filename= doc.xls");
?>

    <table>
            <tr>
                                                <th>ID Consulta</th>
                                                <th>ID Persona</th>
                                                <th>ID Centro salud</th>
                                                <th>ID farmaco</th>
                                                <th>Diagnostico</th>
                                                <th>Uso farmaco</th>
                                                <th>Cantidad farmaco</th>
                                                <th>Frecuencia farmaco</th>
                                                <th>Referido</th>
                                                <th>Año de consulta</th>
            </tr>
    <?php
        include("../connect/conexion.php");
        $sql = "SELECT * FROM consulta";
        $ejecutar=mysqli_query($mysqli, $sql);
        while($row=mysqli_fetch_array($ejecutar)){
    
    ?>
        
                                    
                                    
                                    
            

                                        <tr>
                                            <td><?php echo $row['id_consulta'];?></td>
                                            <td><?php echo $row['id_persona'];?></td>
                                            <td><?php echo $row['id_centro_de_salud'];?></td>
                                            <td><?php echo $row['id_psicofarmaco'];?></td>
                                            <td><?php echo $row['diagnostico'];?></td>
                                            <td><?php echo $row['uso_psicofarmaco'];?></td>
                                            <td><?php echo $row['cantidad_psicofarmaco']." Dosis";?></td>
                                            <td><?php echo $row['frecuencia_psicorfarmaco'];?></td>
                                            <td><?php echo $row['referido'];?></td>
                                            <td><?php echo $row['anio_consulta'];?></td>
                                        </tr>

                                        <?php 
                                        } ?>
                                    
    </table>
