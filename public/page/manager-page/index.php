<?php

include('method/protect.php');
include('method/grafico.php');
include('method/detalhePartidas.php');
include('method/notify.php');  

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

    <main>

        <div class="boas-vindas">
            <article id="texto">
                <h1>Olá, <?php echo $_SESSION['nome']; ?>!</h1>
                <h2>Veja como está o seu centro esportivo</h2>
            </article>

            <article id="quadra">
                <p>Quadra em atividade</p>
                <img src="../../images/quadra.png" alt="quadra">
            </article>
        </div>

        <section class="info-quadra">

            <article class="cont-info-quadra hr">
                <p>Próximos horários</p>

                <?php
                if (count($resultadoPHr) > 0) {
                    // Cria a tabela e imprime os dados
                    echo "<table border='1'><tr id='cabecalho'><td>Data</td><td>Término</td><td id='qtde'>Qtde. Jogadores</td><td>Valor</td></tr>";
                    foreach ($resultadoPHr as $linha) {
                        echo "<tr><td>{$linha['DataPartidaFormatada']}</td><td>{$linha['FimPartidaFormatada']}</td><td id='qtde'>{$linha['NumeroJogadores']}</td><td>{$linha['PrecoPartida']}</td></tr>";
                    }
                } else {
                    // Imprime uma mensagem de erro caso a consulta não tenha retornado nenhum resultado
                    echo "<p>Nenhum resultado encontrado.</p>";
                }

                ?>

                </table>
            </article>

            <article class="cont-info-quadra tbl">
                <p>Jogos Terminados</p>
                <?php
                if (count($resultadoHr) > 0) {
                    // Cria a tabela e imprime os dados
                    echo "<table border='1'><tr id='cabecalho'><td>Data</td><td>Término</td><td id='qtde'>Qtde. Jogadores</td><td>Valor</td></tr>";
                    foreach ($resultadoHr as $linha) {
                        echo "<tr><td>{$linha['DataPartidaFormatada']}</td><td>{$linha['FimPartidaFormatada']}</td><td id='qtde'>{$linha['NumeroJogadores']}</td><td>{$linha['PrecoPartida']}</td></tr>";
                    }
                } else {
                    // Imprime uma mensagem de erro caso a consulta não tenha retornado nenhum resultado
                    echo "<h4>Nenhum resultado encontrado.</h4>";
                }

                ?>

                </table>
            </article>

        </section>

        <h1>Confira seu andamento este mês</h1>

        <section class="relatorios">

            <article class="grafico">

                <div class="sobre-rel">
                    <div id="title">
                        <h3>Hanking de horarios</h3>
                        <p>Veja quantas vezes a quadra foi locada</p>
                    </div>

                    <div class="btn">
                        <img onclick="closeRel()" src="img/close.svg" alt="Fechar">
                        <img src="img/imprime.svg" alt="Imprimir" id="botao-pdf">
                    </div>

                </div>

                <div class="img-grafico">
                    <canvas id="meu-grafico"></canvas>
                </div>

                <div class="buton">
                    <button id="b1" onclick="gerarRelatorio()">Gerar relatório</button>
                    <span class="loader Nvisivel"></span>
                </div>

            </article>

            <article class="grafico">

                <div class="sobre-rel">
                    <div id="title">
                        <h3>Faturamento</h3>
                        <p>Veja o valor que cada quadra rendeu</p>
                    </div>
                    <div class="btn2">
                        <img onclick="closeRel2()" src="img/close.svg" alt="Fechar">
                        <img src="img/imprime.svg" alt="Imprimir" id="botao-pdf2" onclick="imprimirGrafico()">
                    </div>

                </div>

                <div class="img-grafico2">
                    <canvas id="meu-grafico2"></canvas>
                </div>

                <div class="buton">
                    <button id="b2" onclick="gerarRelatorio2()">Gerar relatório</button>
                    <span class="loader2 Nvisivel"></span>
                </div>

            </article>

        </section>


    </main>
    <script src="script/index.js"></script>
    <script>
        var ctx = document.getElementById('meu-grafico').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($mes); ?>,
                datasets: [{
                    label: 'Numero de reservas',
                    data: <?php echo json_encode($qtde); ?>,
                    backgroundColor: [
                        '#085e3c8a',
                    ],
                    borderColor: [
                        '#00a06093',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var ctx2 = document.getElementById('meu-grafico2').getContext('2d');

        var myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($mes2); ?>,
                datasets: [{
                    label: 'Faturamento por mês',
                    data: <?php echo json_encode($total); ?>,
                    backgroundColor: [
                        '#085e3c8a',
                    ],
                    borderColor: [
                        '#00a06093',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        function imprimirGrafico() {
            var canvas = document.getElementById("meu-grafico2");
            var img = new Image();
            img.src = canvas.toDataURL("image/png");

            var printWindow = window.open();
            printWindow.document.write("<html><head><title>Gráfico</title></head><body>");
            printWindow.document.write("<img src='" + img.src + "'/>");
            printWindow.document.write("</body></html>");
            printWindow.print();
        }
    </script>
</body>

</html>