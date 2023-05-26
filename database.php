<?php

$serverName = "leonardo2209202332.bateaquihost.com.br";

$connectionOps = array(
        "Database" => "leonardo2209202332_caio",
        "UID" => "leonardo2209202332_caio",
        "PWD" => "caio@2023"
);
$conn = sqlsrv_connect($serverName, $connectionOps);


if($conn == false){
    echo "Connection não estabelecida.<br />";
    die(print_r(sqlserv_errors(), true));
}

//$UserName = "SA\MZ128YD";