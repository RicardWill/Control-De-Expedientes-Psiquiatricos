<?php 
    session_start();
    require 'connect/conexion.php';

    if(!isset($_SESSION['tipo_usuario'])){
        header("Location: login.php");
    }

    $tipo_usuario = $_SESSION['tipo_usuario'];

    $var = $_GET["var"];

    /// Para centros de salud
    if($tipo_usuario)
        $where = "";

    $sql1 = "SELECT * FROM centros_de_salud";
    $resultado1 = $mysqli->query($sql1);
    ///

    /// Para psicofarmacos
    if($tipo_usuario)
        $where = "";

    $sql2 = "SELECT * FROM psicofarmacos";
    $resultado2 = $mysqli->query($sql2);
    ///


?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Register - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>


    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Registrar Expediente de Paciente</h3></div>
                                    <div class="card-body">

                                    <?php 
                                        if($var == 1)
                                        echo "<form method='POST' name='frm1' id='frm1' action='alta/altaService.php?var=1'>";
                                        if($var == 2)
                                        echo "<form method='POST' name='frm1' id='frm1' action='alta/altaService.php?var=2'>";
                                    ?>
                                        <!--form method="POST" name="frm1" id="frm1" action="alta/altaService.php">-->    
                                            <div class="row mb-3">

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="edad" name="edad" type="text" placeholder="Ingresa tu edad" onkeypress="if((event.keyCode < 48) || (event.keyCode >57)){
                                                        event.returnValue=false;
                                                            } "  maxlength="2"/>
                                                        <label for="edad">Edad</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating">

                                                        <select name="sexo" id="sexo" class="form-control" type="text" placeholder="Ingresa tu sexo">
                                                            <option value="Masculino">Masculino</option>
                                                            <option value="Femenino">Femenino</option>
                                                        </select>
                                                        <label for="sexo">Sexo</label>

                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row mb-3">

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                            <select name="estudios" id="estudios" class="form-control" id="estudios" type="text" placeholder="Ingresa tu sexo">
                                                                <option value="Preescolar">Preescolar</option>
                                                                <option value="Primaria">Primaria</option>
                                                                <option value="Secundaria">Secundaria</option>
                                                                <option value="Preparatoria">Preparatoria</option>
                                                                <option value="Licenciatura">Licenciatura</option>
                                                                <option value="Posgrado">Posgrado</option>
                                                                <option value="Doctorado">Doctorado</option>
                                                            </select>
                                                            <label for="estudios">Estudios</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                            <select name="estado_civil" id="estado_civil" class="form-control" id="estado_civil" type="text" placeholder="Ingresa tu estado civil">
                                                                <option value="Soltero(a)">Soltero(a)</option>
                                                                <option value="Casado(a)">Casado(a)</option>
                                                                <option value="Divorciado(a)">Divorciado(a)</option>
                                                                <option value="Viudo(a)">Viudo(a)</option>
                                                                <option value="Viudo(a)">Comprometido(a)</option>
                                                            </select>
                                                            <label for="estado_civil">Estado Civil</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row mb-3">

                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="ocupacion" name="ocupacion" type="text" placeholder="Ingresa tu ocupación" />
                                                    <label for="ocupacion">&nbsp;&nbsp;Ocupación</label>
                                                </div>

                                            </div>

                                            <div class="row mb-3">

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <!--<input class="form-control" id="id_centro_de_salud" name="id_centro_de_salud" type="text" placeholder="Ingresa el centro de salud" />-->
                                                        
                                                        <select name="id_centro_de_salud" id="id_centro_de_salud" class="form-control" type="text" placeholder="Ingresa el centro de salud">
                                                        <?php 
                                                        while($row = $resultado1->fetch_assoc()){ ?>
                                                            <option value="<?php echo $row['nombre_centro_salud'];?>"><?php echo $row['nombre_centro_salud'];?></option>
                                                        <?php 
                                                        } ?>
                                                        </select>

                                                        <label for="id_centro_de_salud">Centro de salud</label>

                                                        
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select name="id_psicofarmaco" id="id_psicofarmaco" class="form-control" type="text" placeholder="Ingresa el nombre del psicofarmaco">
                                                        <?php 
                                                        while($row = $resultado2->fetch_assoc()){ ?>
                                                            <option value="<?php echo $row['nombre_psicofarmaco'];?>"><?php echo $row['nombre_psicofarmaco'];?></option>
                                                        <?php 
                                                        } ?>
                                                        </select>
                                                        <label for="id_psicofarmaco">Psicofarmaco</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row mb-3">

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="diagnostico" name="diagnostico" type="text" placeholder="Ingresa el diagnostico" />
                                                        <label for="diagnostico">Diagnostico</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating">                                
                                                        <select name="uso_psicofarmaco" id="uso_psicofarmaco" class="form-control" id="uso_psicofarmaco" type="text" placeholder="Ingresa el uso el psifarmaco">
                                                            <option value="Si">Si</option>
                                                            <option value="No">No</option>
                                                        </select>
                                                        <label for="uso_psicofarmaco">¿Uso?</label>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="row mb-3">

                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="cantidad_psicofarmaco" name="cantidad_psicofarmaco" type="text" placeholder="Ingresa las cantidades" onkeypress="if((event.keyCode < 48) || (event.keyCode >57)){
                                                        event.returnValue=false;
                                                            } "  maxlength="1"/>
                                                        <label for="cantidad_psicorfarmaco">Cantidades subministradas</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating">

                                                        <select name="frecuencia_psicorfarmaco" id="frecuencia_psicorfarmaco" class="form-control" id="frecuencia_psicofarmaco" type="text" placeholder="Ingresa la frecuencia de uso">
                                                            <option value="Diaria">Diaria</option>
                                                            <option value="Diaria">Semanal</option>
                                                            <option value="Diaria">Mensual</option>
                                                        </select>
                                                        <label for="frecuencia_psicorfarmaco">Frecuencia de uso</label>
                                                    </div>
                                                </div>

                                            </div>

                                                <!--
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" />
                                                    <input class="form-control" id="inputLastName" type="text" placeholder="Ingresa tu grado de estudios" />
                                                    <label for="inputEmail">Estudios</label>
                                                </div>
                                                -->

                                                <div class="row mb-3">

                                                    <div class="col-md-6">
                                                        <div class="form-floating mb-3 mb-md-0">
                                                            <input class="form-control" id="referido" name="referido" type="text" placeholder="Ingresa el referido" />
                                                            <label for="referido">Referido</label>
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <div class="form-floating">
                                                            <input class="form-control" id="anio_consulta" name="anio_consulta" type="text" placeholder="Ingresa el año de consulta" onkeypress="if((event.keyCode < 48) || (event.keyCode >57)){
                                                        event.returnValue=false;
                                                            } "  maxlength="4"/>
                                                            <label for="anio_consulta">Año de consulta</label>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password_usuario" name="password_usuario" type="password" placeholder="Contraseña de acceso" />
                                                        <label for="password_usuario">Contraseña</label>
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="password_usuario2" name="password_usuario2" type="password" placeholder="Confirmar contraseña" />
                                                        <label for="password_usuario2">Confirmar Contraseña</label>
                                                    </div>
                                                </div>


                                            </div>

                                            <div class="mt-4 mb-0">
                                                <!--Boton de registro-->
                                                <div class="d-grid"><a class="btn btn-primary btn-block" type="button" onclick="comprobarClave()">Añadir Al Expediente</a></div>
                                                <script src='alta/appvlidacion.js'></script>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="index.php">Regresar</a></div>
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
