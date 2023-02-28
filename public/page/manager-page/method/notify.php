<?php

include('../conection/conexao.php'); 

// Define a data/hora atual
$dataHoraAtual = date('Y-m-d H:i:s');

$sql = "SELECT DATE_FORMAT(DataPartida, '%d/%m') as DataPartidaFormatada, DATE_FORMAT(HorarioPartida, '%H:%i') as HorarioPartidaFormatada, NumeroJogadores, NumeroBolas, NumeroUniformes,NomeJogador  from prereserva WHERE DataPartida >= CURDATE()";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultadoPre = $stmt->fetchAll(PDO::FETCH_ASSOC);

$sqlP = "SELECT DATE_FORMAT(DataPartida, '%d/%m') as DataPartidaFormatada, DATE_FORMAT(HorarioPartida, '%H:%i') as HorarioPartidaFormatada, NumeroJogadores, NumeroBolas, NumeroUniformes  from PARTIDAS WHERE DataPartida > NOW() AND DataPartida < DATE_ADD(NOW(), INTERVAL 1 DAY)"; 
$stmtP = $pdo->prepare($sqlP);
$stmtP->execute();
$resultadoP = $stmtP->fetchAll(PDO::FETCH_ASSOC);
 

$sql2 = "SELECT SUM(soma) as soma_total
FROM (
    SELECT count(*) AS soma
    FROM PARTIDAS
    WHERE DataPartida > NOW() AND DataPartida < DATE_ADD(NOW(), INTERVAL 1 DAY)

    UNION ALL

    SELECT COUNT(*) as soma
    FROM toplay.prereserva
    WHERE DataPartida >= CURDATE()
) as subquery";

$somaNot = "";

// Executa a consulta SQL
$result = mysqli_query($mysqli, $sql2);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $somaNot = $row["soma_total"];
} else {
    $somaNot = "0";
}       

// Fecha a conexão com o banco de dados
mysqli_close($mysqli);
?> 