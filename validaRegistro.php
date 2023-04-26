<?php

include_once('database.php');

if(isset($_POST['registrar']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['senha']) && isset($_POST['permissao'])){
    $nome = trim(strip_tags($_POST['nome']));
    $email = trim(strip_tags($_POST['email']));
    $cpf = trim(strip_tags($_POST['cpf']));
    $senha_old = trim(strip_tags($_POST['senha']));
    $permissao = trim(strip_tags($_POST['permissao']));

    if($permissao == "Admin"){
        $permissao = "Admin";
    } if($permissao == "Usuario"){
        $permissao = "Usuario";
    }

    //print_r($permissao);

    $options = [
        'cost' => 12,
    ];

    $senha = password_hash($senha_old, PASSWORD_BCRYPT, $options);

    $userData = array(
        'nome_usuario' => $nome,
        'email' => $email,
        'cpf' => $cpf,
        'senha' => $senha,
        'permissao' => $permissao
    );


    $sql = "INSERT INTO Users(nome_usuario, email, cpf, senha, permissao) VALUES (?,?,?,?,?)";

    $params = array(
        &$nome,
        &$email,
        &$cpf,
        &$senha,
        &$permissao
    );

    $stmt = sqlsrv_query($conn, $sql, $params);
    
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}
    
header("Location: index.php");
} else {
    header("Location: registro.php");
}