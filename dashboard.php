<?php
session_start();
//echo $_SESSION['permissao'];

if((!isset($_SESSION['senha'])== true) || (!isset($_SESSION['email'])== true)){
    session_destroy();
    header("Location: index.php");
} else {
$logado = $_SESSION['email'];
$id_rls = $_SESSION['id_rls'];
$senha = $_SESSION['senha'];
$nomeUsuario = $_SESSION['nome'];
$id_usuario =  $_SESSION['id_user'];

//echo $logado;
//echo $id_rls;
//echo $nomeUsuario;
//echo $id_usuario;

include_once('database.php');
ini_set('display_errors', 0 ); error_reporting(0); 

if(isset($_POST['pesquisar']) && (isset($_POST['workspace']))){

$workspace = $_POST['pesquisar'];


if($workspace > 0 && $workspace < 99999999999999){
    $sql = "SELECT Users_workspace.id_workspace, nome, data_workspace, id_user  from Workspace 
    left join Users_workspace on Workspace.id_workspace = Users_workspace.id_workspace where id_user = '$id_usuario' and Users_workspace.id_workspace = '$workspace'";

} else{
    $sql = "SELECT Users_workspace.id_workspace, nome, data_workspace, id_user  from Workspace 
    left join Users_workspace on Workspace.id_workspace = Users_workspace.id_workspace where id_user = '$id_usuario' and nome like '%$workspace%'";
}



$stmt =  $mysqli->query($sql);

if($stmt) {
    $row = mysqli_fetch_assoc($stmt);
}

$relatorio = $row['data_workspace'];

$reportid_old = substr($relatorio, 45, 36);

$Auth_old = substr($relatorio, 101, 36);

$novo_relatorio = "https://app.powerbi.com/reportEmbed?reportId=$reportid_old&autoAuth=true&ctid=$Auth_old";

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
    <link rel="icon" type="image/png" href="img/solutionsbi.png"/>
    <title>Dashboard</title>

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

        @media(min-width: 1240px){
            #dashboard{
                width:1500px;
                height:700px;
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
                    <?php if($id_rls == 1 || $id_rls == 2 || $id_rls == 3 || $id_rls == 4){ ?>    <a class="collapse-item" href="cadastrarWorkspace.php">Cadastrar Workspace</a>  <?php }?>
                        <a class="collapse-item" href='relatorioWorkspace.php?id=<?php echo $id_usuario ?>'>Relatório Workspace</a>
                    </div>
                </div>
            </li>
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
                       <a href="relatorioUsers.php" class="collapse-item" href="utilities-color.html">Relatório de Usuarios</a> 
                    </div>
                </div> 
                <?php }?>
            </li> 


            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
           <br>
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
                    <form 
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="POST">
                        <div class="input-group">
                            <input id="Pesquisar" name="pesquisar" type="text" class="form-control bg-light border-0 small" placeholder="Digita o id ou o nome do Workspace"
                                aria-label="Search" aria-describedby="basic-addon2" >
                            <div class="input-group-append"> 
                            <input onclick="searchData()"  type="submit" name="workspace" value="Pesquisar">
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
 
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
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><?php echo $row['nome'];  ?></h1>
                    </div> <!--Power Bi-->

                    <iframe id="dashboard" title="<?php echo $row['nome'] ?>" width="950" height="400" src="<?php echo $novo_relatorio; ?>" frameborder="0" allowFullScreen="true"></iframe>
                </div>
                <!-- /.container-fluid -->
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
<script>
    var search = document.getElementById('Pesquisar');
    function searchData()
    {
        windows.location = 'dashboard.php?search='+search.value;
    }
</script>
</html>