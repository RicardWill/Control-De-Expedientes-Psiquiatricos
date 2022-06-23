<?php 

    session_start();

    require 'connect/conexion.php';

    if(!isset($_SESSION['tipo_usuario'])){
        header("Location: login.php");
    }

    $tipo_usuario = $_SESSION['tipo_usuario'];


    ///
    if($tipo_usuario){

        $where = "";

    }
    //

    $sql = "SELECT * FROM consulta";
    
    $resultado = $mysqli->query($sql);
    ///

    $id_persona = $_GET["id_persona"];
?>

<!DOCTYPE html>
<html lang="es">
    <!--
         
    -->
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Expediente</title>

        <!--
        Bootstrap usado desde la web 
        -->
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

        
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Marca de barra de navegación
                 Redirección 
            -->
            <a class="navbar-brand ps-3" href="index.php"><B>GESTIÓN DE EXPEDIENTES </B></a>
            
            <!-- Alternar barra lateral 
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">OCULTAR<i class="fas fa-bars"></i></button> -->
            
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>OCULTAR OPCIONES</B><i class=""></i></button>

            <!-- Búsqueda en la barra de navegación 
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            --> 

            <!-- Barra de navegación-->
            <ul class="navbar-nav ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <!-- Uso de php -->
                        <?php 
                        
                        if($tipo_usuario==1){
                            echo "Usuario Médico, Su ID de inicio de sesión -> ".$id_persona." "; 
                        }
                        if($tipo_usuario==2){
                            echo "Usuario Paciente, Su ID de inicio de sesión -> ".$id_persona." "; 
                        }
                        ?><i class="fas fa-user fa-fw"></i></a>
                    
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!--<li><a class="dropdown-item" href="#!">Registro de actividad</a></li>-->
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="unlogin.php">Cerrar sesión</a></li>
                    </ul>
                </li>
            </ul>

        </nav>

        <div id="layoutSidenav">
            
            <div id="layoutSidenav_nav">
                
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    
                    <div class="sb-sidenav-menu">
                        
                        <div class="nav">
                            
                            <div class="sb-sidenav-menu-heading">Consultas De Consumo</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Consultas Expedidas
                            </a>

                            <?php if($tipo_usuario==1){ ?>

                            <div class="sb-sidenav-menu-heading">Administrar</div>

                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>Registro
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Registrar expediente
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="registerPaciente.php?var=2">Registrar Usuario Paciente</a>
                                            <a class="nav-link" href="registerPaciente.php?var=1">Registrar Usuario Médico</a>
                                            <!--
                                            <a class="nav-link" href="login.html">Registrar Médico</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                            -->
                                        </nav>
                                    </div>
                                    
                                    <!--
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>-->
                                    
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                
                                </nav>
                            
                            </div>
                            <?php } ?>


                            <div class="sb-sidenav-menu-heading">CONSULTAS DE PERSONAS</div>
                            
                            <!--
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            -->
                            
                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tabla de usuario(s)
                            </a>
                        
                        </div>
                    
                    </div>
                    
                    <div class="sb-sidenav-footer">
                        <div class="small">Te has registrado como:</div>
                        <?php 
                        if($tipo_usuario==1){
                            echo "Usuario Médico"; 
                        }
                        if($tipo_usuario==2){
                            echo "Usuario Paciente"; 
                        }
                        ?>
                    </div>
                
                </nav>
            </div>

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><center>CONSULTAS EXPEDIDAS</center></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tablero de todas las consultas</li>
                        </ol>
                        <div class="row">
                            
                            
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Generar Excel</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="excel/generarExcel.php">Clic Aquí</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Generar PDF</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="pdf/generarPdf.php">Clic Aquí</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <!--
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            -->
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de Consultas
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" name="datatablesSimple">
                                    <thead>
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
                                    </thead>
                                    <tfoot>
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
                                        </tfoot>
                                    
                                    <tbody>
                                        <?php 
                                        while($row = $resultado->fetch_assoc()){ ?>

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
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </main>
               
               
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

        <!--
        Scripts
        -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        
        <!--
        Gráficas
        -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="assets/demo/datatables-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
    </body>
    
</html>
