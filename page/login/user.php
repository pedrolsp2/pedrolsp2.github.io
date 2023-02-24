<?php
    include('../conection/conexao.php');

    $status = "";

    if(isset($_POST['user']) || isset($_POST['password'])){
        if(strlen($_POST['user']) == 0 || strlen($_POST['password']) == 0){
            $status = "Preencha todos os campos!";
        }
        else{

            $email = $mysqli->real_escape_string($_POST['user']);
            $senha = $mysqli->real_escape_string($_POST['password']);

            $sql_code = "SELECT * FROM users WHERE email = '$email' OR usuario = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die('Falha no SQL: ' . $mysqli->error);

            $qnd = $sql_query->num_rows;

            if($qnd == 1){

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['usuario'];

                header("Location: ../manager-page/index.php"); 

            }else{
                $status = "E-mail ou senha incorretos!";
            }

        }
    }    
?>