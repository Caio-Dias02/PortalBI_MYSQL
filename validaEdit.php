<?php
include_once('database.php');
session_start();

//print_r($sql);
//print_r($stmt);

// Exibe o resultado

if((!isset($_SESSION['senha'])== true) || (!isset($_SESSION['email'])== true)){
    session_destroy();
    header("Location: index.php");
} 
$logado = $_SESSION['email'];

if(isset($_POST['editar']) && isset($_POST['nomeWorkspace']) && isset($_POST['Workspace'])){
    $id_workspace = $_POST['id_workspace'];
    $nome_workspace = $_POST['nomeWorkspace'];
    $url_workspace = $_POST['Workspace'];

    $sql = "UPDATE Workspace SET nome = '$nome_workspace', data_workspace = '$url_workspace' WHERE id_workspace = '$id_workspace'";

    $stmt = sqlsrv_query($conn, $sql);
}
header("Location: dashboard.php");

