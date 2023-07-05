<?php

$host = "localhost";
$user = "root";
$senha = "";
$database = "portalweb";

$mysqli = new mysqli($host, $user, $senha, $database);

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "portalweb");

$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);


if($mysqli->connect_errno){

    echo "Erro";
} 

?>