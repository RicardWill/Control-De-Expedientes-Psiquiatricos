<?php 
    session_start();
    require 'connect/conexion.php';

    if(!isset($_SESSION['tipo_usuario'])){
        header("Location: login.php");
    }

    $tipo_usuario = $_SESSION['tipo_usuario'];
    /////////////////////////////////////////////////////////////////////      OBTENER UNA VARIABLE DESDE UNA QUERY
    
    $sql = "SELECT * FROM persona WHERE tipo_usuario='$tipo_usuario'";
        
        $resultado = $mysqli->query($sql);
        $num = $resultado->num_rows;

        $row = $resultado->fetch_assoc();

            $edad = $row['edad'];
    
    //////////////////////////////////////////////////////////////////////////////////////////////////////////////
    if($tipo_usuario == 1){

        $where = "";

    }else if($tipo_usuario == 2){

        $where = "WHERE edad='$edad'";

    }
    //

    $sql = "SELECT * FROM persona $where";
    
    $resultado = $mysqli->query($sql);


    ?>
    

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.php"><B>GESTIÓN DE EXPEDIENTES </B></a>
            <!-- Sidebar Toggle
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            -->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!" style="text-decoration:none">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<B>OCULTAR OPCIONES</B><i class=""></i></button>
            
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
               
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
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
                            <!--
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            -->
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Registro
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

                            <div class="sb-sidenav-menu-heading">Consulta de Personas</div>
                            <!--
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            -->

                            <a class="nav-link" href="tables.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                <CENTER>
                                Tabla de usuario(s)
                                </CENTER>
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Te has registrado como:</div>
                        <?php 
                        if($tipo_usuario==1){
                            echo "Usuario Médico ";
                        }
                        if($tipo_usuario==2){
                            echo "Usuario Paciente "; 
                        }
                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    
                    

                    <div class="container-fluid px-4">
                        <h1 class="mt-4"><center>Tabla de usuario(s)</center></h1>
                        <div class="card mb-4">
                            <div class="card-body">
                                <CENTER>Datos oficiales de usuarios que accedieron a realizar el registro para generar su expediente.</CENTER>
                                <!--<a target="_blank" href="https://datatables.net/">official DataTables documentation</a>-->
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Generar Excel</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="excel/generarExcelUsers.php">Clic Aquí</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Generar PDF</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="pdf/generarPdfUsers.php">Clic Aquí</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tabla de usuarios
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
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
                                    </thead>
                                    <tfoot>
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
                                    </tfoot>
                                    <tbody>

                                        <?php 
                                        while($row = $resultado->fetch_assoc()){ ?>

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
                                <!--
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                                -->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>


        
    </body>
</html>
