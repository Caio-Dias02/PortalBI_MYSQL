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

if(!empty($_GET['id_relacionamento'])){
    $id_relacionamento =  $_GET['id_relacionamento'];

    $sql = "DELETE FROM Users_workspace WHERE id_relacionamento = '$id_relacionamento'";
    
   // print_r($sql);

    $stmt = sqlsrv_query($conn, $sql);

    header("Location: relatorioUsuarios.php");
}