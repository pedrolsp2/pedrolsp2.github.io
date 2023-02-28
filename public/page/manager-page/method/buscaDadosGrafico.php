<?php

include('../conection/conexao.php'); 

if(!isset($_SESSION)){
    session_start();
} 


$qtdeVG1 = "";
$ordemG1 = "";
$qtdeVG2 = "";
$ordemG2 = "";

$sqlG1 = "SELECT * FROM grafico where tableId = 1";
$resultadoG1 = $mysqli->query($sqlG1);
if ($resultadoG1->num_rows > 0) {
    while ($linha = $resultadoG1->fetch_assoc()) {
        $qtdeVG1 = $linha['qtdeViews'];
        $ordemG1 = $linha['orderTable'];
    }
} else {
    die;
}

$sqlG2 = "SELECT * FROM grafico where tableId = 2";
$resultadoG2 = $mysqli->query($sqlG2);
if ($resultadoG2->num_rows > 0) {
    while ($linha = $resultadoG2->fetch_assoc()) {
        $qtdeVG2 = $linha['qtdeViews'];
        $ordemG2 = $linha['orderTable'];
    }
} else {
    die;
}

?>