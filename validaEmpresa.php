<?php

include_once('database.php');

if(isset($_POST['registrar']) && isset($_POST['nome'])){
    $nome_empresa = trim(strip_tags($_POST['nome']));

    $userData = array(
        'nome_empresa' => $nome_empresa
    );
    $sql = "INSERT INTO empresas(nome_empresa) VALUES (?)";

    $params = array(
        &$nome_empresa
    );

    $stmt = sqlsrv_query($conn, $sql, $params);
    
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
    
header("Location: index.php");
} else {
    header("Location: empresas.php");
}