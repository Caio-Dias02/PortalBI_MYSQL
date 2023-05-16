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

if(!empty($_GET['id_usuario'])){
    $id_usuario =  $_GET['id_usuario'];

    $sql = "DELETE FROM Users WHERE id_user = '$id_usuario'";
    
   // print_r($sql);

    $stmt = sqlsrv_query($conn, $sql);

    header("Location: relatorioUsers.php");
} header("Location: relatorioUsers.php");