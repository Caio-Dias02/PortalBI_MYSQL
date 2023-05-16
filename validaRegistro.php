<?php

include_once('database.php');

if(empty($_POST['permissao'])){
    die("<script language='javascript'>
        window.alert('Selecione um valor para permissão')
        window.location.href='registro.php';
        </script>");
 }

 if(empty($_POST['empresas'])){
    die("<script language='javascript'>
        window.alert('Selecione um valor para Empresas')
        window.location.href='registro.php';
        </script>");
 }

if(isset($_POST['registrar']) && isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['senha']) && isset($_POST['permissao']) && isset($_POST['empresas'])){
    $nome = trim(strip_tags($_POST['nome']));
    $email = trim(strip_tags($_POST['email']));
    $cpf = trim(strip_tags($_POST['cpf']));
    $senha_old = trim(strip_tags($_POST['senha']));
    $permissao = trim(strip_tags($_POST['permissao']));
    $empresas = trim(strip_tags($_POST['empresas']));


    //Valida CPF

        // Extrai somente os números
        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
         
        // Verifica se foi informado todos os digitos corretamente
        if (strlen($cpf) != 11) {
            die("CPF INCORRETO");
        }
    
        // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            die("CPF INVÁLIDO(NÚMEROS REPETIDOS)");
        }
    
        // Faz o calculo para validar o CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                die("CPF INVÁLIDO");
            }
        }
    
        $options = [
        'cost' => 12,
        ];

    $senha = password_hash($senha_old, PASSWORD_BCRYPT, $options);

    $userData = array(
        'nome_usuario' => $nome,
        'email' => $email,
        'cpf' => $cpf,
        'senha' => $senha,
        'id_rls' => $permissao,
        'empresas' => $empresas
    );

    $sql = "INSERT INTO Users(nome_usuario, email, cpf, senha, id_rls, id_empresa) VALUES (?,?,?,?,?,?)";

    $params = array(
        &$nome,
        &$email,
        &$cpf,
        &$senha,
        &$permissao,
        &$empresas
    );

    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if( $stmt === false ) {
        die( print_r( sqlsrv_errors(), true));
    }
    
header("Location: index.php");
} else {
    header("Location: registro.php");
}

