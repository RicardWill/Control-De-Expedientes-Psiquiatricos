<?php
    /*---------------------------------------------------IMPORTACIÓN DE LA CONEXIÓN--------------------------------------------*/ 
    require "connect/conexion.php";

    session_start();

    if($_POST){
        /*-------------------------------------------MÉTODOS POST PARA ATRAER LOS FORM----------------------------------------*/ 

        $tipo_usuario = $_POST['tipo_usuario'];
        $password_usuario = $_POST['password_usuario'];
        $id_persona = $_POST['id_persona'];
        
        /*----------------------------------------------CONSULTA A LA BASE DE DATOS-------------------------------------------*/

        $sql = "SELECT * FROM persona WHERE tipo_usuario='$tipo_usuario' and password_usuario='$password_usuario' and id_persona='$id_persona'";
        
        $resultado = $mysqli->query($sql);
        /*-------------------------------------VERIFICAR QUE LA LONGITUD DE CONTRASEÑA A 0------------------------------------*/
        $num = $resultado->num_rows;

        if($num>0){
            //Fila de la Contraseña
            $row = $resultado->fetch_assoc();

            $contrasenaBD = $row['password_usuario'];


            //Secure Hash Algorithm sha1 algoritmo
            //$pass_c = sha1($password_usuario);
            $pass_c = $password_usuario;

                //Iniciar la sesión
                if($contrasenaBD == $pass_c){
                    $_SESSION['tipo_usuario'] = $row['tipo_usuario'];

                    header("Location: index.php?id_persona=$id_persona");

                //Mostrar los datos incorrectos
                }else{
                    echo "La contraseña es incorrecta---";
                    echo $pass_c;
                    echo "--YYYY--";
                    echo $contrasenaBD;
                }
            //Mencionar que el usuario no esta registrado
        }else{
            echo "NO existe el usuario";
        }

    }
    
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        
        <title>Inicio de sesión</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Inicio de Sesión</h3></div>
                                    <div class="card-body">

                                        <!--AQUI SE AGREGARÁ EL MÉTODO PARA LA BD - EL FORMULARIO SE ENVIARÁ A SÍ MISMO Y SE VOLVERÁ A CARGAR-->
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" name= "tipo_usuario" type="text" placeholder="tipo_usuario"/>
                                                <!--<input class="form-control" id="inputEmail" name= "nombre" type="email" placeholder="name@example.com" /> -->
                                                <label for="inputEmail">Tipo De Usuario - 1: Medico - 2: Paciente</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="id_persona" name= "id_persona" type="text" placeholder="id_persona" />
                                                <label for="inputPassword">Id de registro</label>
                                            </div>

                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name= "password_usuario" type="password" placeholder="Password" />
                                                <label for="inputPassword">Contraseña</label>
                                            </div>


                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Recordar contraseña</label>
                                            </div>


                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Olvidaste tu contraseña?</a>
                                                <button type="submit" class="btn btn-primary">Loguear</button>
                                                <!--
                                                <button type="submit" class="btn btn-primary" href="index.html">Loguear</button>
                                                -->
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <!--<div class="small"><a href="register.html">No tienes cuenta? Registrate!</a></div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Los BMW</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>

    </body>

</html>
