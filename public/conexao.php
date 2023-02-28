<?php

$host = "localhost";
$user = "root";
$pass = "";
$dbname = "toplay";
$port = 3306;

try{
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);

   // echo "Conexão Sucesso";
}
catch (PDOException $err){
    echo "Erro: Conexão falhou. " . $err->getMessage();
}

?>