<?php

include_once('database.php');

if(isset($_POST['registrar']) && isset($_POST['nome'])){
    $nome_empresa = trim(strip_tags($_POST['nome']));

    $sqli = mysqli_query($mysqli, "INSERT INTO empresas(nome_empresa) VALUES('$nome_empresa')");
    
    
header("Location: index.php");
} else {
    header("Location: empresas.php");
}