<?php
include_once('database.php');
session_start();

//print_r($sql);
//print_r($stmt);
if((!isset($_SESSION['senha'])== true) || (!isset($_SESSION['email'])== true)){
    session_destroy();
    header("Location: index.php");
} 
// Exibe o resultado
if(empty($_POST['empresas'])) {
   die("<script language='javascript'>
        window.alert('Selecione um valor para empresas')
        window.location.href='relatorioUsers.php';
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
    $id_empresa = $_POST['empresas'];
    $id_user = $_POST['id_user'];

    //print_r($permissao);
    //print_r($id_workspace);
   // print_r($nome);
   // print_r($email);
    //print_r($cpf);
   // print_r($permissao);
   // print_r($id_empresa);
    //print_r($id_user);

    $sql = "UPDATE Users SET nome_usuario = '$nome', email = '$email', cpf = '$cpf', id_empresa = $id_empresa WHERE id_user = '$id_user'";

    $stmt = sqlsrv_query($conn, $sql);

     header("Location: relatorioUsers.php");
}
header("Location: relatorioUsers.php");

