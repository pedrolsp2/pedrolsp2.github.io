<?php

include_once "../conexao.php";

date_default_timezone_set('America/Sao_Paulo'); 
$data = date('H:i:s');



$query_sits = "SELECT HorarioPartida from partidas where DataPartida = '2022-12-19'";
#"SELECT DataPartida from prereserva WHERE DataPartida >= '" . date('Y-m-d H:i:s') . "' ORDER BY DataPartida ASC limit 1";
$result_sits = $conn->prepare($query_sits);
$result_sits->execute();

if(($result_sits) and ($result_sits->rowCount() != 0)){
    while($row_sit = $result_sits->fetch(PDO::FETCH_ASSOC)){
        extract($row_sit);
        $dados[] = [
            'HorarioPartida' => $HorarioPartida
        ];
    }
    $retorna = $dados;
}else{
    $retorna = 0;
}

/*
$query_separar = "select hour('$DuracaoPartida') as hora, minute('$DuracaoPartida') as minuto";
$result_separar = $conn->prepare($query_separar);
$result_separar->execute();

if(($result_separar) and ($result_separar->rowCount() != 0)){
    while($row_separar = $result_separar->fetch(PDO::FETCH_ASSOC)){
        extract($row_separar);
        $hr[] = [
            'hora' => $hora,
            'minuto' => $minuto
        ];
        $teste = $hr;
    }
}else{
    $teste = "Sem horario";
}

$query_soma_minuto = "select date_add('$datafinal2', interval '$minuto' minute) as Tempo";
$result_soma_minuto = $conn->prepare($query_soma_minuto);
$result_soma_minuto->execute();
$valores = $result_soma_minuto->fetch(PDO::FETCH_ASSOC);
$tempo_minuto = $valores['Tempo'];

$query_soma_hora = "select date_add('$tempo_minuto', interval '$hora' hour) as Hora";
$result_soma_hora = $conn->prepare($query_soma_hora);
$result_soma_hora->execute();
$valoresHR = $result_soma_hora->fetch(PDO::FETCH_ASSOC);
$tempo_hora = $valoresHR['Hora'];
*/
echo json_encode($retorna);



