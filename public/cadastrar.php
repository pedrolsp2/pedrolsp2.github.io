<?php

include_once "conexao.php";

$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados['DataPartida'])){
    $retorna = ['status' => false, 'msg' =>  "<div class='alert error'>
    <input type='checkbox' id='alert1'/>
<label class='close' title='close' for='alert1'>
  <i class='fa-solid fa-circle-xmark btn-fecha'></i>
</label>
    <p class='inner'>
        <strong>ERRO!</strong> Necessário preencher a data da partida!
    </p>
</div>"];
   
}elseif(empty($dados['HorarioPartida'])){
    $retorna = ['status' => false, 'msg' =>  "<div class='alert error'>
    <input type='checkbox' id='alert1'/>
<label class='close' title='close' for='alert1'>
  <i class='fa-solid fa-circle-xmark btn-fecha'></i>
</label>
    <p class='inner'>
        <strong>ERRO!</strong> Necessário preencher o horario da partida!
    </p>
</div>"];
}elseif(empty($dados['DuracaoPartida'])){
    $retorna = ['status' => false, 'msg' =>  "<div class='alert error'>
    <input type='checkbox' id='alert1'/>
<label class='close' title='close' for='alert1'>
  <i class='fa-solid fa-circle-xmark btn-fecha'></i>
</label>
    <p class='inner'>
        <strong>ERRO!</strong> Necessário preencher a duração da partida!
    </p>
</div>"];
}elseif(empty($dados['NumeroJogadores'])){
    $retorna = ['status' => false, 'msg' =>  "<div class='alert error'>
    <input type='checkbox' id='alert1'/>
<label class='close' title='close' for='alert1'>
  <i class='fa-solid fa-circle-xmark btn-fecha'></i>
</label>
    <p class='inner'>
        <strong>ERRO!</strong> Necessário preencher o numero de jogadores da partida!
    </p>
</div>"];
}elseif(empty($dados['NumeroBolas'])){
    $retorna = ['status' => false, 'msg' =>  "<div class='alert error'>
    <input type='checkbox' id='alert1'/>
<label class='close' title='close' for='alert1'>
  <i class='fa-solid fa-circle-xmark btn-fecha'></i>
</label>
    <p class='inner'>
        <strong>ERRO!</strong> Necessário preencher o numero de bolas da partida!
    </p>
</div>"];
}elseif(empty($dados['NumeroUniformes'])){
    $retorna = ['status' =>  false, 'msg' =>  "<div class='alert error'>
    <input type='checkbox' id='alert1'/>
<label class='close' title='close' for='alert1'>
  <i class='fa-solid fa-circle-xmark btn-fecha'></i>
</label>
    <p class='inner'>
        <strong>ERRO!</strong> Necessário preencher o numero de uniformes da partida!
    </p>
</div>"];
}elseif(empty($dados['NomeJogador'])){
    $retorna = ['status' =>  false, 'msg' =>  "<div class='alert error'>
    <input type='checkbox' id='alert1'/>
<label class='close' title='close' for='alert1'>
  <i class='fa-solid fa-circle-xmark btn-fecha'></i>
</label>
    <p class='inner'>
        <strong>ERRO!</strong> Necessário preencher um nome para contato!
    </p>
</div>"];
}elseif(empty($dados['TelJogador'])){
    $retorna = ['status' =>  false, 'msg' =>  "<div class='alert error'>
    <input type='checkbox' id='alert1'/>
<label class='close' title='close' for='alert1'>
  <i class='fa-solid fa-circle-xmark btn-fecha'></i>
</label>
    <p class='inner'>
        <strong>ERRO!</strong> Necessário preencher um telefone para contato!
    </p>
</div>"];
}
else{

    $data = ($dados['DataPartida'] . " " . $dados['HorarioPartida']);
    $query_usuario = "INSERT INTO prereserva (DataPartida, HorarioPartida, DuracaoPartida, NumeroJogadores,NumeroBolas, NumeroUniformes, NomeJogador, TelJogador) VALUES (:DataPartida, :HorarioPartida, :DuracaoPartida, :NumeroJogadores, :NumeroBolas, :NumeroUniformes, :NomeJogador, :TelJogador)";
    $cad_usuario = $conn->prepare($query_usuario);
    $cad_usuario->bindParam(':DataPartida', $data);
    $cad_usuario->bindParam(':HorarioPartida', $dados['HorarioPartida']);
    $cad_usuario->bindParam(':DuracaoPartida', $dados['DuracaoPartida']);
    $cad_usuario->bindParam(':NumeroJogadores', $dados['NumeroJogadores']);
    $cad_usuario->bindParam(':NumeroBolas', $dados['NumeroBolas']);
    $cad_usuario->bindParam(':NumeroUniformes', $dados['NumeroUniformes']);
    $cad_usuario->bindParam(':NomeJogador', $dados['NomeJogador']);
    $cad_usuario->bindParam(':TelJogador', $dados['TelJogador']);
    $cad_usuario->execute();

    if($cad_usuario->rowCount()){   
        $retorna = ['status' => true, 'msg' => "'<div class='alert success'>
        <input type='checkbox' id='alert2'/>
        <label class='close' title='close' for='alert2'>
            <i class='fa-solid fa-circle-xmark btn-fecha'></i>
    </label>
        <p class='inner'>
           <strong>Sucesso!</strong> Sua pré reserva foi feita com sucesso!
        </p>
    </div>"];
    }else{
        $retorna = ['status' => false, 'msg' => "<p id='message-erro'>Erro: Pré reserva feita não cadastrado com sucesso!</p>"];
    }    
}
echo json_encode($retorna);