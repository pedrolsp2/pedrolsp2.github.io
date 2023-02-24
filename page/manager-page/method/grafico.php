<?php

include('../conection/conexao.php'); 

$retornaMes = "";
$retornaVlr = "";

if(!isset($_SESSION)){
    session_start();
} 

$sql = "SELECT MONTHNAME(DataPartida) AS mes, COUNT(*) AS quantidade FROM partidas GROUP BY mes";
$resultado = $mysqli->query($sql);
if ($resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $mes[] = $linha['mes'];
        $qtde[] = $linha['quantidade'];
    }
    $retornaMes = "1";
} else {
    $retornaMes = "0";
}

$sql2 = "SELECT MONTHNAME(DataPartida) AS mes, SUM(PrecoPartida) AS soma FROM partidas GROUP BY MONTH(DataPartida)";
$resultado2 = $mysqli->query($sql2);
if ($resultado2->num_rows > 0) {
    while ($linha2 = $resultado2->fetch_assoc()) {
        $mes2[] = $linha2['mes'];
        $total[] = $linha2['soma'];
    }
    $retornaVlr = "1";
} else {
    $retornaVlr = "0";
}
?>