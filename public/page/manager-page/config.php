<?php

include('method/notify.php');
include('method/buscaDadosGrafico.php');
include('method/editaTabela.php');

?>

<!DOCTYPE html>
<html lang="en">

<title>ToPlay &#8211; Gerenciamento de quadras</title>
<meta name="viewport" content="width=device-width">
<meta name="title" content="To Play &#8211; Gerenciamento de Quadras">
<meta name="description" content="Gerencie seu centro esportivo com facilidade.">
<meta name="keywords" content="Quadras, UEMG, Gerenciar, ToPlay">
<meta name="author" content="GIMPS">
<meta name="image" content="../../images/logo.png">
<meta name="theme-color" content="#085e3b">
<link rel="stylesheet" href="css/style.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<link rel="icon" href="../../images/icone.ico">
</head>

<body>
    <section class="notify">
        <img src="img/close.svg" alt="fechar" id="close-notify" onclick="notify()">
        <h1>Central de notificações</h1>
        <hr>

        <?php

        if (count($resultadoP) > 0) {

            foreach ($resultadoP as $linha) {
                echo "
                <div class='itms'>
                <div class='logo-notify'>
                    <img src='img/not-partida.svg' alt='Partida Proxima' width='82'>
                </div>
                <div class='cont-notify'>
                    <h3>Partida próxima!</h3>
                    <p>Uma partida com {$linha['NumeroJogadores']} jogadores, irão usar {$linha['NumeroUniformes']} coletes e {$linha['NumeroBolas']} bolas.</p>
                    <p>Data prevista para {$linha['DataPartidaFormatada']} às {$linha['HorarioPartidaFormatada']}</p>
                </div>
            </div>
            <hr>";
            }
        } else {
            // Imprime uma mensagem de erro caso a consulta não tenha retornado nenhum resultado
            echo "<p>Parece que você não tem notificações!</p>";
        }

        ?>

        <?php

        if (count($resultadoPre) > 0) {

            foreach ($resultadoPre as $linha) {
                echo "
                <div class='itms'>
                <div class='logo-notify'>
                    <img src='img/not-pre.svg' alt='Pre Reserva' width='82'>
                </div>
                <div class='cont-notify'>
                    <h3>Pré Reserva feita!</h3>
                    <p>O cliente {$linha['NomeJogador']} fez uma pré reserva para {$linha['DataPartidaFormatada']} às {$linha['HorarioPartidaFormatada']}.</p><p>Serão {$linha['NumeroJogadores']} jogadores, usaram {$linha['NumeroUniformes']} coletes e {$linha['NumeroBolas']} bola(s).</p>
                </div>
            </div>
            <hr>";
            }
        } else {
            // Imprime uma mensagem de erro caso a consulta não tenha retornado nenhum resultado
            echo "";
        }

        ?>
    </section>

    <section id="sair">
        <div class="deseja-sair">
            <h1>Deseja mesmo sair?</h1>
            <div class="but">
                <button onclick="sair('sim')">Sim</button>
                <button onclick="sair('nao')">Não</button>
            </div>
        </div>
    </section>

    <header>

        <button class="logo" id="logo" onclick="notify()">
            <a onclick="notify()">
                <img src="img/avatar.jpg" alt="avatar" onclick="notify()">
                <span id="count" onclick="notify()"><?php echo $somaNot; ?></span>
            </a>
        </button>

        <div class="menu-header">
            <button id="bbtn" onclick="openSet()">
                <img src="img/settin.svg" alt="Settins" id="set">
            </button>

            <button id="bbtn2" onclick="openSetMob()">
                <img src="img/settin.svg" alt="Settins" id="set2">
            </button>

            <div class="config-setting" id="aabb">

                <a href=""><img src="img/notifys.svg" alt="" class="" id="not"></a>
                <a href="config.php"><img src="img/docs.svg" alt="" class="" id="doc"></a>
                <a href=""><img src="img/gra.svg" alt="" class="" id="gra"></a>

            </div>
            <img src="img/sair.svg" alt="Sair" onclick="sair('sair')">
        </div>
    </header>

    <div class="sub-header-mob">
        <a href=""><img src="img/notifys.svg" alt="" class="" id="not-mob">Notificações</a>
        <a href="config.php"><img src="img/docs.svg" alt="" class="" id="doc-mob">Jogos</a>
        <a href=""><img src="img/gra.svg" alt="" class="" id="gra-mob">Gráficos</a>
    </div>


    <div class="configs">

        <a href="index.php"><img src="img/volar.svg" alt="Voltar" id="back" width="3%"></a>

        <section class="config-tabela">

            <article id="cab">

            <img src="img/editar.svg" onclick="editarTabelas()" alt="Editar" id="edit">
                <form method="POST" id="editaTabela">
                    <h2>Tabela 01</h2>
                    <h3>Próximos horários</h3>

            </article>

            <article id="valor">

                <article id="orde">

                    <label for="ordedar">Ordedar por:</label>
                    <select name="orderSelect" id="orderSelect" disabled>
                        <option value="desc">Decrescente</option>
                        <option value="asc">Crescente</option>
                    </select>

                </article>

                <article id="n-part">
                    <label for="rangeInput">Nº de partidas a serem mostradas:</label>
                    <input name="rangeInput" type="range" id="rangeInput" min="0" max="10" value="<?php echo $qtdeVG1; ?>" disabled>
                    <a id="outputValue"><?php echo $qtdeVG2; ?></a>
                </article>
            </article>

        </section>
        <section class="config-tabela">

            <article id="cab">

                <h2>Tabela 02</h2>
                <h3>Jogos Terminados</h3>

            </article>

            <article id="valor">

                <article id="orde">

                    <label for="ordedar">Ordedar por:</label>
                    <select name="orderSelect2" id="orderSelect2" disabled>
                        <option value="desc">Decrescente</option>
                        <option value="asc">Crescente</option>
                    </select>

                </article>

                <article id="n-part">
                    <label for="rangeInput2">Nº de partidas a serem mostradas:</label>
                    <input name="rangeInput2" type="range" id="rangeInput2" min="0" max="10" value="<?php echo $qtdeVG2; ?>" disabled>
                    <a id="outputValue2"><?php echo $qtdeVG2; ?></a>
                </article>
            </article>
        </section> 
        <button type="submit" id="salvarAlteracao">Salvar Alterações</button>
        </form>
</body> 
<script src="script/index.js"></script>
<script>
    
    var range = document.getElementById('rangeInput')
    var vlr = document.getElementById('outputValue')

    range.addEventListener('change', () => {
        vlr.innerHTML = range.value
    })
    var range2 = document.getElementById('rangeInput2')
    var vlr2 = document.getElementById('outputValue2')

    range2.addEventListener('change', () => {
        vlr2.innerHTML = range2.value
    })

    var opc1 = document.getElementById('orderSelect');
    var opc2 = document.getElementById('orderSelect2');

    var resultopc1 = <?php echo json_encode($ordemG1); ?>;
    var resultopc2 = <?php echo json_encode($ordemG2); ?>;

    opc1.value = resultopc1;
    opc2.value = resultopc2;

    function editarTabelas() {
        var range = document.getElementById('rangeInput')
        var range2 = document.getElementById('rangeInput2')

            if (opc1.disabled == false && range.disabled == false && opc2.disabled == false && range2.disabled == false) {
                opc1.disabled = true;
                range.disabled = true;
                opc2.disabled = true;
                range2.disabled = true;
            }else {
                opc1.disabled = false;
                range.disabled = false;
                opc2.disabled = false;
                range2.disabled = false;
            }
        } 

        function closeMsg() {
            document.getElementById('sucesso').classList.toggle('remove-msg')
        }

</script>
</div>

</html>