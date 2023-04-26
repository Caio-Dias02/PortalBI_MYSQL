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

if(!empty($_GET['id'])){
    $id_workspace =  $_GET['id'];

    //echo $id_workspace;

    $sql = "SELECT * FROM Users_workspace WHERE id_workspace = '$id_workspace'";
    $sql2 = "SELECT * FROM Workspace WHERE id_workspace = '$id_workspace'";

    $stmt = sqlsrv_query($conn, $sql);
    $stmt2 = sqlsrv_query($conn, $sql2);

        if($stmt){
            while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
            $sql = "DELETE FROM Users_workspace WHERE id_workspace = '$id_workspace'"; 
            $stmtDelete = sqlsrv_query($conn, $sql); 
            } if($stmt2){
                while($row2 = sqlsrv_fetch_array($stmt2, SQLSRV_FETCH_ASSOC)){
                    $sql2 = "DELETE FROM Workspace WHERE id_workspace = '$id_workspace'"; 
                    $stmtDelete2 = sqlsrv_query($conn, $sql2); 
                    } header("Location: dashboard.php");
            }
        } 
}