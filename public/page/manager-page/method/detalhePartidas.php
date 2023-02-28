<?php

include('../conection/conexao.php'); 
include('buscaDadosGrafico.php'); 

$dataHoraAtual = date('Y-m-d H:i:s');

$sql2 = "SELECT DATE_FORMAT(DataPartida, '%d/%m %H:%i') as DataPartidaFormatada, DATE_FORMAT(FimPartida, '%d/%m %H:%i') as FimPartidaFormatada, NumeroJogadores, PrecoPartida  from partidas WHERE DataPartida >= NOW() order by DataPartidaFormatada " . $ordemG2 . " LIMIT " . $qtdeVG2;
$stmt2 = $pdo->prepare($sql2);
$stmt2->execute();
$resultadoPHr = $stmt2->fetchAll(PDO::FETCH_ASSOC);


$sql = "SELECT DATE_FORMAT(DataPartida, '%d/%m %H:%i') as DataPartidaFormatada, DATE_FORMAT(FimPartida, '%d/%m %H:%i') as FimPartidaFormatada, NumeroJogadores, PrecoPartida  from partidas WHERE DataPartida <= CURDATE() AND  HorarioPartida <= current_time() order by DataPartidaFormatada " . $ordemG2 . " LIMIT " . $qtdeVG2;
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultadoHr = $stmt->fetchAll(PDO::FETCH_ASSOC);
