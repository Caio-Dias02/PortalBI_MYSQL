<?php 

session_start();
include_once('database.php');

$id_planilha = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

$sql = "SELECT arquivo_csv FROM  planilha WHERE id_planilha = $id_planilha ORDER BY id_planilha DESC";

$stmt  = sqlsrv_query($conn, $sql);

if($stmt){
    while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)){
        //var_dump($row);
        extract($row);
        header("Content-Type: text/csv");
        echo $arquivo_csv;


        
    }
} else {
    echo "erro";
}


?>