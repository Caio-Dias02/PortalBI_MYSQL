<?php
include_once('database.php');
session_start();

//print_r($sql);
//print_r($stmt);

// Exibe o resultado

if((!isset($_SESSION['senha'])== true) || (!isset($_SESSION['email'])== true)){
    session_destroy();
    header("Location: index.php");
} else {
$logado = $_SESSION['email'];
$id_rls = $_SESSION['id_rls'];
$nomeUsuario = $_SESSION['nome'];
$id_usuario =  $_SESSION['id_user'];
if(!empty($_GET['id'])){
    $id_user =  $_GET['id'];

    $sql = "SELECT * FROM Users WHERE id_user = '$id_user'";

    //print_r($sql);

    $sqlWorkspace = "SELECT * FROM empresas";

    $stmt =  $mysqli->query($sql);

    $stmt2 = $mysqli->query($sqlWorkspace);

        if($stmt){
            while($row = mysqli_fetch_assoc($stmt)){
                $id_user = trim(strip_tags($row['id_user']));
                $nomeUsers = trim(strip_tags($row['nome_usuario']));
                $email = trim(strip_tags($row['email']));
                $cpf = trim(strip_tags($row['cpf']));
                $senha = trim(strip_tags($row['senha']));
            }        //print_r($Workspace);
        } else {
            header("Location: dashboard.php");
        }
}


}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

    <title>Cadastrar Workspace</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        .imgSolutions{
            width: 80px;
            height: 80px;
        }
        .arruma{
            margin-left:250px;
            margin-bottom:40px;
        }
        @media(min-width: 1240px){
            .arruma{
            margin-left:570px;
            margin-bottom:40px;
        }
        }

    
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon fotoSolutions ">
                    <img src="img/solutionsbi.png" alt="" class="imgSolutions">
                </div>
                <div class="sidebar-brand-text mx-3">Solutions BI</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Workspace</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <?php if($id_rls == 1 || $id_rls == 2 || $id_rls == 3 || $id_rls == 4){ ?>     <a class="collapse-item" href="cadastrarWorkspace.php">Cadastrar Workspace</a> <?php } ?>
                        <a class="collapse-item" href='relatorioWorkspace.php?id=<?php echo $id_usuario ?>'>Relatório Workspace</a>
                    </div>
                </div>
                              <!-- Nav Item - Utilities Collapse Menu -->
              <?php if($id_rls == 1 || $id_rls == 2 || $id_rls == 3 || $id_rls == 4){ ?> <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                    <a href="relatorioUsuarios.php" class="collapse-item" href="utilities-color.html">Usuarios/Workspace</a> 
                       <a href="relatorioUsuarios.php" class="collapse-item" href="utilities-color.html">Relatório de Usuarios</a> 
                    </div>
                </div> <?php }?>
            </li>
    
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <a href="relatorioUsuarios.php">Voltar</a>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['nome']?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="sair.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
            <div class="limiter">
			        <div class="wrap-login100 arruma">
				        <form action="validaUser.php" method="POST" class="login100-form validate-form">
                            <span class="login100-form-title p-b-26">
                                Editar Usuario
                            </span>
                            <span class="login100-form-title p-b-48">
                                <img src="img/solutionsbi.png" alt="" class="imgSolutions">
                            </span>
                            <div hidden class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="id_user" value="<?php echo $id_user; ?>" placeholder="id_user">
                                <span class="focus-input100" ></span>
                            </div>
                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="nome" value="<?php echo $nomeUsers; ?>" placeholder="Nome">
                                <span class="focus-input100" ></span>
                            </div>

                            <div class="wrap-input100 validate-input" data-validate = "Valido e-mail é : teste@gmail.com" placeholder="Email">
                                <input class="input100" type="text" name="email" value="<?php echo $email; ?>">
                                <span class="focus-input100" ></span>
                            </div>

                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="text" name="cpf" value="<?php echo $cpf; ?>" placeholder="CPF">
                                <span class="focus-input100" ></span>
                            </div> 
                            <div>
                            <select name="empresas" class="" aria-label=".form-select-sm example">
                                <option disabled selected>Empresas</option>
                                <?php while($row2 = mysqli_fetch_assoc($stmt2)){ 
                                echo "<option value='$row2[id_empresa]'>".$row2['nome_empresa']."</option>";
                                 } ?>
                            </select>
                            </div> <br>
                            <input type="submit" name="editar" value="Editar">
                            <br><br>
                    </form>

            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Voce deseja sair?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecione "Sair" para encerrar a sessao.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="sair.php">Sair</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>