<?php
if(!isset($_SESSION)){
    session_start();
}


if(!isset($_SESSION['nome'])){
    die('
    <head><link rel="stylesheet" href="css/style.css"></head>
        <body>
            <div class="protect">
                <div class="protect-cont">
                    <h1>Parece que você não está logado!<br>
                        Logue <a href="../login/index.php">aqui!</a></h1>
                </div>
            </div>
        </body>
    ');
}
?>