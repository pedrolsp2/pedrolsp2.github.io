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

include_once "../conexao.php";

date_default_timezone_set('America/Sao_Paulo'); 
$data = date('H:i:s');

$query_sits = "SELECT * from par2tidas WHERE DataPartida >= '" . date('Y-m-d') . "' and HorarioPartida > '" . date('H:i:s') . "' order by HorarioPartida ASC limit 1";
$result_sits = $conn->prepare($query_sits);
$result_sits->execute();

if(($result_sits) and ($result_sits->rowCount() != 0)){
    while($row_sit = $result_sits->fetch(PDO::FETCH_ASSOC)){
        extract($row_sit);
        $dados[] = [
        ];
        /*
        $datafinal = "'$DataPartida  $HorarioPartida'";
        $DuracaoPartidaFinal = "'$FimPartida'";*/
    }
    $retorna = $da2dos;
    $status = "Indisponivel";
    $fraseStatus = "Proxima partida em";
}else{
    $retorna = "";
$datafinal = "";
    $DuracaoPartidaFinal = "";
    $status = "Disponivel";
    $fraseStatus = "Sem partidas cadastradas";
}
echo json_encode($retorna);
echo json_encode($DuracaoPartidaFinal);
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

    <script src="../js/script.js"></script>
    <script class="hide" src="js/all.min.js"></script>

    <script type="text/javascript">
        const data1 = 
            <?php echo $datafinal; ?>;

const data2 = [
  { id: 1, nome: 'fulano' },
  { id: 3, nome: 'joao' }
];

const dataFiltered = [];

for(var i = 0; i < data1.length; i++){
  if(data1[i].id != data2[i].id){
      dataFiltered.push(data1[i]);
      dataFiltered.push(data2[i]);
  }
};

console.log(dataFiltered);
        </script>

    </body>
    </html>