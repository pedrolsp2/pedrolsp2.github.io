<?php
 
 include('../conection/conexao.php');

 $resp = "";
 $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(empty($dados)){
}
else{
    $sql = "UPDATE grafico SET qtdeViews = :rangInput, orderTable = :orderSelect WHERE tableId=1;
            UPDATE grafico SET qtdeViews = :rangInput2, orderTable = :orderSelect2 WHERE tableId=2;";
    $edita = $pdo->prepare($sql);
    $edita->bindParam(':rangInput', $dados['rangeInput']);
    $edita->bindParam(':orderSelect', $dados['orderSelect']);
    $edita->bindParam(':rangInput2', $dados['rangeInput2']);
    $edita->bindParam(':orderSelect2', $dados['orderSelect2']);
    $edita->execute();
    
    echo "
    <section id='sucesso'> 
        <a onclick='closeMsg()'><img src='img/close2.svg' alt='Fechar'></a>
        <h1>Edições salvas com sucesso!</h1> 
    </section>
    ";
}




 ?> 