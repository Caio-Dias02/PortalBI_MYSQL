<?php
include_once('database.php');
session_start();

//print_r($sql);
//print_r($stmt);
if((!isset($_SESSION['senha'])== true) || (!isset($_SESSION['email'])== true)){
    session_destroy();
    header("Location: index.php");
} 

 if(empty($_POST['Workspaces'])){
    die("<script language='javascript'>
        window.alert('Selecione um valor para Workspace')
        window.location.href='relatorioUsuarios.php';
        </script>");
 }


if((!isset($_SESSION['senha'])== true) && (!isset($_SESSION['email'])== true)){
    unset($_SESSION['senha']);
    unset($_SESSION['email']);
    header("Location: index.php");
} 
$logado = $_SESSION['email'];

if(isset($_POST['editar']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cpf'])){

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];
    $id_workspace = $_POST['Workspaces'];
    $id_user = $_POST['id_user'];


    $userWorkspace= array(
        'id_user' => $id_user,
        'id_workspace' => $id_workspace,
    );

    $sql = "UPDATE Users SET nome_usuario = '$nome', email = '$email', cpf = '$cpf' WHERE id_user = '$id_user'";

    $sqlWorkspace =  "INSERT INTO Users_workspace(id_user, id_workspace) VALUES (?,?)";

    $params = array(
        &$id_user,
        &$id_workspace
    );

    $stmt = sqlsrv_query($conn, $sql);

    $stmt2 = sqlsrv_query($conn, $sqlWorkspace, $params);

    //print_r($stmt);
   // print_r($stmt2);

     header("Location: relatorioUsuarios.php");
}
//header("Location: dashboard.php");

