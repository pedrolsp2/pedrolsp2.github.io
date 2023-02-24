<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>To Play &#8211; Gerenciamento de Quadras</title>
    <meta name="viewport" content="width=device-width">
    <meta name="title" content="To Play &#8211; Gerenciamento de Quadras">
    <meta name="description" content="Veja os status das quadras.">
    <meta name="keywords" content="Quadras, UEMG, Gerenciar, ToPlay">
    <meta name="author" content="GIMPS">
    <meta name="image" content="images/logo.png">
	<meta name="theme-color" content="#085e3b">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" media="(max-width: 450px)" href="css/mobile.css">
    <link rel="icon" href="images/icone.ico">
</head>

<body> 	
    <?php

        include_once "conexao.php";

        date_default_timezone_set('America/Sao_Paulo'); 
        $data = date('H:i:s'); 
        
        $query_sits = "SELECT DataPartida, FimPartida, HorarioPartida from partidas WHERE DataPartida >= '" . date('Y-m-d') . "' and HorarioPartida > '" . date('H:i:s') . "' order by HorarioPartida ASC limit 1";
        $result_sits = $conn->prepare($query_sits);
        $result_sits->execute();
        
        if(($result_sits) and ($result_sits->rowCount() != 0)){
            while($row_sit = $result_sits->fetch(PDO::FETCH_ASSOC)){
                extract($row_sit);
                $dados[] = [
                    'DataPartida' => $DataPartida,
                    'FimPartida' => $FimPartida
                ]; 
                $datafinal = "'$DataPartida'";
                $DuracaoPartidaFinal = "'$FimPartida'"; 
            }
            $retorna = $dados;
            $status = "Indisponivel";
            $fraseStatus = "Proxima partida em";
        }else{
            $retorna = "";
        $datafinal = "";
            $DuracaoPartidaFinal = "";
            $status = "Disponivel";
            $fraseStatus = "Sem partidas cadastradas";
        }
    ?>

<header id="header">
		<div class="logo"></div>

		<nav id="nav">

			<button aria-label="Abrir Menu" id="btn-celular" aria-expanded="" aria-controls="menu"
				aria-haspopup="true">Menu
				<span id="icon-menu"></span>
			</button>

			<ul class="menu" role="menu">
				<li><a href="inicio.html">Home</a></li> 
				<li><a href="partida.html">Pré Reserva</a></li>
				<li><a href="quadra.php">Status da Quadra</a></li>
				<li><a href="page/login/login.html">Login</a></li>
			</ul>

		</nav>
	</header>

	<div class="second-nave">
		<div class="second-menu">
			<a href="inicio.html" id="icon-menu-inferior">
				<div class="second-item left">
					<i class="fa-solid fa-house"></i>
				</div>
			</a>

			<a href="page/login/login.html" id="icon-menu-inferior">
				<div class="second-item">
					<i class="fa-solid fa-magnifying-glass-chart"></i>
				</div>
			</a>

			<div class="second-item" id="second-logo"><img src="images/logo.png"></div>

			<a href="" id="icon-menu-inferior">
				<div class="second-item">
				</div>
			</a>

			<a href="partida.html" id="icon-menu-inferior">
				<div class="second-item">
					<i class="fa-solid fa-user-plus"></i>
				</div>
			</a>

			<a href="quadra.php" id="icon-menu-inferior">
				<div class="second-item rigth ativo">
					<i class="fa-solid fa-futbol"></i>
				</div>
			</a>

		</div>
	</div>

<main>  
<h2>Quadra 01</h2>
<div class="area-quadra">
    <div class="quadra01">
        <img src="images/quadra.png" alt="Quadra">
        <div class="local-quadra">
       <div class="conteudo-quadra"> 
            <h2 id="status"><?php echo $status; ?></h2>
            <h3 id="proxima-partida"><?php echo $fraseStatus; ?></h3>
            <form id="tempo" name="form_main">
                <div class="horarios">
                    <span id="days">00</span>:<span id="hours">00</span>:<span id="min">00</span>:<span id="sec">00</span>
                </div>
                </form>
        </div>
    </div>
</div>
</main>

<div class="local-quadra-mob active"></div>
<div class="andamento active"> 
       <div class="conteudo-quadra"> 
            <h2 id="status"  class="jogo-indisponivel">Indisponível</h2>
            <h3 id="proxima-partida" class="partida-indisponivel">Partida em andamento!<br>Encerra em</h3> 
            <form id="tempo" name="form_main">
                <div class="horarios" id="hr-indisponivel">
                    <span id="days2">00</span>:<span id="hours2">00</span>:<span id="min2">00</span>:<span id="sec2">00</span>
            </form>
                </div>
        </div>
</div>
<div class="footer">
    <div class="footerSobre"> 
        <h3>GIMPS</h3>
    
        <p>Somos um grupo de 5 alunos do curso de Sistemas de Informações - UEMG Frutal.
            Projeto feito inicialmente na linguagem JAVA, junto com o MySql, desenvolvido pelo NetBeans. O Grupo tinha como objetivo, criar um projeto interdiciplinar, com finalidade de estudos, e parte da grade do 1 semestre letivo no ano de 2022.</p>
    </div>
    <hr>
    <div class="footerSobre"> 
        <h3>Contato</h3>
    
        <p id="pfooter"><i class="fa-solid fa-location-dot" id="iconfooter"></i>Endereço:&nbsp &nbsp</p>
            <a>Av. Mario Palermo - nº 1000 | Frutal/MG</a>
        <br>
    
        <p id="pfooter"><i class="fa-solid fa-envelope" id="iconfooter"></i>E-mail:&nbsp  &nbsp &nbsp &nbsp</p>
            <a>toplay@gimps.com.br</a>
        <br>
    
        <p id="pfooter"><i class="fa-solid fa-phone" id="iconfooter"></i>Telefone:&nbsp &nbsp</p>
            <a>(34) 3421-1100</a>
        <br>
    </div>
    </div>
    <script src="js/script.js"></script>
    <script class="hide" src="js/all.min.js"></script>
    <script type="text/javascript"> 
    
        var horario = <?php echo $datafinal; ?>;
        var horariofim = <?php echo $DuracaoPartidaFinal;?>;
        let to = new Date(horario);
		let to2 = new Date(horariofim); 
        var crono = {};
        var obj = {};
            
        function update()
        {
            let from = new Date();
            let diff=to-from;
            if(diff>0)
            {
                let days=setTwoDigit(Math.floor(diff/1000/60/60/24)),
                hours=setTwoDigit(Math.floor(diff/1000/60/60)%24),
                min=setTwoDigit(Math.floor(diff/1000/60)%60),
                sec=setTwoDigit(Math.floor(diff/1000)%60)
                document.querySelector('#days').innerText=days
                document.querySelector('#hours').innerText=hours
                document.querySelector('#min').innerText=min
                document.querySelector('#sec').innerText=sec
            }
            else
            {
                document.querySelector('.local-quadra').classList.add('active');
                document.querySelector('.andamento').classList.replace('active','Nactive');
                document.querySelector('.local-quadra-mob').classList.replace('active','Nactive');
                crono.func();
            }
		}
                 crono.func = function update2(){
                 let from2 =new Date();
                     diff2=to2-from2;
                     if(diff2>0){
                     let days2=setTwoDigit(Math.floor(diff2/1000/60/60/24)),
                     hours2=setTwoDigit(Math.floor(diff2/1000/60/60)%24),
                     min2=setTwoDigit(Math.floor(diff2/1000/60)%60),
                     sec2=setTwoDigit(Math.floor(diff2/1000)%60)
                     document.querySelector('#days2').innerText=days2
                     document.querySelector('#hours2').innerText=hours2
                     document.querySelector('#min2').innerText=min2
                     document.querySelector('#sec2').innerText=sec2
                 } else{
                     clearInterval(interval);
                      document.querySelector('.local-quadra').classList.remove('active');
                     document.querySelector('.andamento').classList.replace('Nactive','active');
                      clearInterval(interval);
                      location.reload();
                     }
		 }
        
             obj.func = function() {
             setTimeout(function(){ location.reload(); }, 1);
            
         };
		
		 let interval=setInterval(update,1000)

		 function setTwoDigit(argument) {
		 	return argument>9?argument:'0'+argument;
		 }

    </script>

    </body>
    </html>