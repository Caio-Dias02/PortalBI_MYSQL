<?php

$serverName = "BR3250703W4\\SQLEXPRESS2014";

$connectionOps = array(
        "Database" => "portalbi",
        "UID" => "",
        "PWD" => ""
);
$conn = sqlsrv_connect($serverName, $connectionOps);


if($conn == false){
    echo "Connection não estabelecida.<br />";
    die(print_r(sqlserv_errors(), true));
}

//$UserName = "SA\MZ128YD";