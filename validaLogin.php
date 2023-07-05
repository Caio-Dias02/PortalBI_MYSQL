<?php
include_once('database.php');
session_start();

if(isset($_POST['login']) && isset($_POST['email']) && isset($_POST['senha'])){

$email = trim(strip_tags($_POST['email']));
$senha = trim(strip_tags($_POST['senha']));

//echo $email;
//echo $senha;

$sql = "SELECT * FROM rls WHERE email = '$email'";

//echo $sql;

$result = $mysqli->query($sql);


//print_r($sql);
//print_r($stmt);

// Exibe o resultado

if($result) {
    $row = mysqli_fetch_assoc($result);
    if(password_verify($senha, $row['senha'])){
        $_SESSION['id_rls_rls'] = $row['id_rls'];
        $_SESSION['email_rls'] = $row['email'];
        $_SESSION['senha_rls'] = $row['senha'];
       // echo $_SESSION['id_rls_rls'];
       // echo $_SESSION['email_rls'];
       // echo $_SESSION['senha_rls'];
        
        header("Location: rlsLogin.php");
    } else {
        header("Location: index.php");
    }
}
}

else {
    header("Location: index.php");
}