<?php 
    session_start();
    require '../connect/conexion.php';

    include "../connect/conexion.php";
    
    if(!isset($_SESSION['tipo_usuario'])){
        header("Location: login.php");
    }

    $tipo_usuario = $_SESSION['tipo_usuario'];
    $var = $_GET["var"];

    
?>

<?php
        //SQL Puede aceptar un insert into con valor vacío si es autoincrement
        $edad = $_POST['edad'];
        $sexo = $_POST['sexo'];
        $estudios = $_POST['estudios'];
        $estado_civil = $_POST['estado_civil'];
        $ocupacion = $_POST['ocupacion'];
        $id_centro_de_salud = $_POST['id_centro_de_salud'];
        $id_psicofarmaco = $_POST['id_psicofarmaco'];
        $diagnostico = $_POST['diagnostico'];
        $uso_psicofarmaco = $_POST['uso_psicofarmaco'];
        $cantidad_psicofarmaco = $_POST['cantidad_psicofarmaco'];
        $frecuencia_psicorfarmaco = $_POST['frecuencia_psicorfarmaco'];
        $referido = $_POST['referido'];
        $anio_consulta = $_POST['anio_consulta'];
        $password_usuario = $_POST['password_usuario'];
        $password_usuario2 = $_POST['password_usuario2'];

        //ID de uso único basado en el reloj 
        $uniquee = uniqid();

        $query1 = "INSERT INTO persona(id_persona, edad, sexo, estudios, estado_civil, ocupacion, tipo_usuario, password_usuario, uniquee) VALUES
            (NULL, $edad, '$sexo', '$estudios', '$estado_civil', '$ocupacion', $var, '$password_usuario', '$uniquee');";

        $execute1 = mysqli_query($mysqli,$query1);

        /////////////////////////////////////////////////////////////////////      OBTENER UNA VARIABLE DESDE UNA QUERY
    
        $queryAux = "SELECT * FROM persona WHERE uniquee='$uniquee'";
            
        $resultado = $mysqli->query($queryAux);
        $num = $resultado->num_rows;

        $row = $resultado->fetch_assoc();

            $id_persona = $row['id_persona'];
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////

        $query2 = "INSERT INTO consulta(id_consulta, id_persona, id_centro_de_salud, id_psicofarmaco, diagnostico, uso_psicofarmaco, cantidad_psicofarmaco, frecuencia_psicorfarmaco, referido, anio_consulta) VALUES
            (NULL, $id_persona, 1, 1, '$diagnostico', '$uso_psicofarmaco', '$cantidad_psicofarmaco', '$frecuencia_psicorfarmaco', '$referido', '$anio_consulta');";

        $execute2 = mysqli_query($mysqli,$query2);

        

                //echo "<center><H2>Datos correctamente insertados</H2></center>";

        echo "<script language='javascript'>alert('Tu id para iniciar sesión es');</script>";
        sleep(4);
        header("Location: ../index.php");
?>