<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>To Play &#8211; Partida</title>
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="css/normalize.css">
	<link rel="stylesheet" href="../css/styles.css">
	<link rel="stylesheet" media="(max-width: 450px)" href="../css/mobile.css">
	<link rel="icon" href="images/icone.ico">
</head>

<body> 	
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

<div class="second-nave">
	<div class="second-menu">
		<a href="../inicio.html" id="icon-menu-inferior">
			<div class="second-item ativo left">
				<i class="fa-solid fa-house"></i>
			</div>
		</a>

		<a href="../historico.html" id="icon-menu-inferior">
			<div class="second-item">
				<i class="fa-solid fa-magnifying-glass-chart"></i>
			</div>
		</a>

		<div class="second-item" id="second-logo"><img src="images/logo.png"></div>

		<a href="" id="icon-menu-inferior">
			<div class="second-item">
			</div> 
		</a>

		<a href="" id="icon-menu-inferior">
			<div class="second-item">
				<i class="fa-solid fa-user-plus"></i>
			</div> 
		</a>

		<a href="" id="icon-menu-inferior">
			<div class="second-item rigth">
				<i class="fa-solid fa-futbol"></i>
			</div>
		</a>

	</div>
</div>
<main>
        <h2>Faça seu pré agendamento aqui!</h2>
				<span id="msgAlerta"></span>
	<div class="area-form">
			<div class="nv-partida">
				<h4>Partida</h4>
				<form method="POST" id="PreReserva">
						<input type="date" name="DataPartida" id="DataPartida"/>

						<input type="time" name="HorarioPartida" id="HorarioPartida"/>

						<input type="time" name="DuracaoPartida" id="DuracaoPartida"/>

						<div id="cx-input"><input type="text" id="NumeroJogadores" name="NumeroJogadores" maxlength="2"></input><a>Jogadores</a></div>
			</div> 
					<div class="nv-partida">
						<h4>Informações</h4>
						<input type="number" name="NumeroBolas" id="NumeroBolas" placeholder="Bolas"/>           
						<input type="number" name="NumeroUniformes" id="NumeroUniformes" placeholder="Coletes"/>
						<input type="text" name="NomeJogador" id="NomeJogador" placeholder="Digite seu nome"/>
						<input type="text" name="TelJogador" id="TelJogador" placeholder="Telefone para contato"/>
					</div>
	</div>
				<button type="submit" id="cria-partida">Concluir</button>
			</form>
</main>
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
<script src="http://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</body>
</html>
