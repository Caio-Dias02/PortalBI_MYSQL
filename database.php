<?php

$host = "sql107.infinityfree.com";
$user = "epiz_34340527";
$senha = "IylzuCyYi6ea";
$database = "epiz_34340527_portalweb";

$mysqli = new mysqli($host, $user, $senha, $database);

define("DB_SERVER", "sql107.infinityfree.com");
define("DB_USER", "epiz_34340527");
define("DB_PASSWORD", "IylzuCyYi6ea");
define("DB_DATABASE", "epiz_34340527_portalweb");

$connect = mysqli_connect(DB_SERVER , DB_USER, DB_PASSWORD, DB_DATABASE);


if($mysqli->connect_errno){

    echo "Erro";
} 

?>
