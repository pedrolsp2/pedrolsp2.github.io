<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>To Play &#8211; Quadras</title>
	<meta name="viewport" content="width=device-width">
	<!--<link rel="stylesheet" href="css/normalize.css">-->
	<link rel="stylesheet" href="../css/style.css">
	<link rel="icon" href="images/icone.ico">
</head>

<body> 	
    <?php

        include_once "conexao.php";

        date_default_timezone_set('America/Sao_Paulo'); 
        $data = date('H:i:s');
        
        $query_sits = #"SELECT DataPartida from prereserva WHERE DataPartida >= '" . date('Y-m-d H:i:s') . "' ORDER BY DataPartida ASC limit 1";
        "SELECT DataPartida, HorarioPartida, FimPartida from partidas WHERE DataPartida >= '" . date('Y-m-d') . "' and HorarioPartida > '" . date('H:i:s') . "' order by HorarioPartida ASC limit 1";
        $result_sits = $conn->prepare($query_sits);
        $result_sits->execute();
        
        if(($result_sits) and ($result_sits->rowCount() != 0)){
            while($row_sit = $result_sits->fetch(PDO::FETCH_ASSOC)){
                extract($row_sit);
                $dados[] = [
                    'DataPartida' => $DataPartida,
                    'HorarioPartida' => $HorarioPartida,
                    'FimPartida' => $FimPartida
                ];
                $datafinal = "'$DataPartida  $HorarioPartida'";
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
        
        <button aria-label="Abrir Menu" id="btn-celular" aria-expanded="" aria-controls="menu" aria-haspopup="true">Menu
            <span id="icon-menu"></span>
        </button> 
        <ul class="menu" role="menu">
                <li><a href="inicio.html">Home</a></li>
				<li><a href="partida.php">Partida</a></li>
				<li><a href="quadra.php">Quadras</a></li> 
        </ul>

    </nav>
</header>

<main>  
<h2>Quadra 01</h2>
<div class="area-quadra">
    <div class="quadra01">
        <img src="../images/quadra.png" alt="Quadra">
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
<div class="andamento active">
       <div class="conteudo-quadra"> 
            <h2 id="status"><?php echo $status; ?></h2>
            <h3 id="proxima-partida">Partida em andamento!</h3>
            <h4 style="font-size: 15px;">Encerra em</h4>
            <form id="tempo" name="form_main">
                <div class="horarios">
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
    <script src="../js/script.js"></script>
    <script class="hide" src="js/all.min.js"></script>
    <script type="text/javascript">

        var horario = <?php echo $datafinal; ?>;
        let to =new Date(horario);
        var horariofim = <?php echo $DuracaoPartidaFinal;?>;
		let to2 =new Date(horariofim);
            var crono = {};
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
                    document.querySelector('.andamento').classList.add('alert');
                    obj.func();
                    }
		}
        
        var obj = {};
            obj.func = function() {
            setTimeout(function(){ location.reload(); }, 2000);
            
        };
		function update()
        {
            let from =new Date();
				diff=to-from;
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
                    crono.func();
                    document.querySelector('.local-quadra').classList.add('active');
                    document.querySelector('.andamento').classList.replace('active','Nactive');
			    }
		}
		
		let interval=setInterval(update,1000)

		function setTwoDigit(argument) {
			return argument>9?argument:'0'+argument;
		}

    </script>

    </body>
    </html>