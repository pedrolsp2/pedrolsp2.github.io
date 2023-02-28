<?php

$user = 'root';
$senha = '';
$db = "toplay";
$host = 'localhost';

$mysqli = new mysqli($host, $user, $senha, $db);
$pdo = new PDO('mysql:host=localhost;dbname=toplay', 'root', '');

if($mysqli->error){
    die('Erro ao conectar' . $mysqli->error);
}

?>