<?php
include_once('database.php');

//print_r($_POST['nomeWorkspace']);
//print_r($_POST['Workspace']);
if((!isset($_SESSION['senha'])== true) || (!isset($_SESSION['email'])== true)){
    session_destroy();
    header("Location: index.php");
} 

if(isset($_POST['cadastrar']) && isset($_POST['nomeWorkspace']) && isset($_POST['Workspace'])){
    $nomeWorkspace = trim(strip_tags($_POST['nomeWorkspace']));
    $Workspace = trim(strip_tags($_POST['Workspace']));

    $Workspace_data = array(
        'nomeWorkspace' => $nomeWorkspace,
        'Workspace' => $Workspace
    );

    $sql = "INSERT INTO Workspace(nome, data_workspace) VALUES(?,?)";

    //print_r($sql);

    $params = array(
        &$nomeWorkspace,
        &$Workspace,
    );

    $stmt = sqlsrv_query($conn, $sql, $params);
    
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
    
header("Location: dashboard.php");

} else {
    header("Location: cadastrarWorkspace.php");
}