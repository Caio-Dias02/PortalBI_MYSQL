<?php
include_once('database.php');
session_start();

if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['senha'])){

$email = trim(strip_tags($_POST['email']));
$senha = trim(strip_tags($_POST['senha']));

$sql = "SELECT * FROM Users WHERE email = '$email'";


$stmt = sqlsrv_query($conn, $sql);

//print_r($sql);
//print_r($stmt);

// Exibe o resultado

if($stmt) {
    $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
    if(password_verify($senha, $row['senha'])){
        $_SESSION['id_user'] = $row['id_user'];
        $_SESSION['nome'] = $row['nome_usuario'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['senha'] = $row['senha'];
        $_SESSION['permissao'] = $row['permissao'];
        header("Location: dashboard.php");
    } else {
        header("Location: index.php");
    }
}
}

else {
    header("Location: index.php");
}