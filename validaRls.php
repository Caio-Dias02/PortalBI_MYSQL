<?php

include_once('database.php');

if(isset($_POST['registrar']) && isset($_POST['email'])  && isset($_POST['senha'])){
    $email = trim(strip_tags($_POST['email']));
    $senha_old = trim(strip_tags($_POST['senha']));

    //print_r($permissao);

    $options = [
        'cost' => 12,
    ];

    $senha = password_hash($senha_old, PASSWORD_BCRYPT, $options);

    $userData = array(
        'email' => $email,
        'senha' => $senha,
    );

    $sql = "INSERT INTO rls(email, senha) VALUES (?,?)";

    $params = array(
        &$email,
        &$senha
    );

    $stmt = sqlsrv_query($conn, $sql, $params);

    print_r($stmt);
    
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
    
    header("Location: index.php");
} else {
    header("Location: rlsCadastro.php");
}