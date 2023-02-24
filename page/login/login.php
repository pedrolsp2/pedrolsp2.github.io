<?php
    include('user.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
	<title>ToPlay &#8211; Login</title>
	<meta name="viewport" content="width=device-width">
	<meta name="title" content="To Play &#8211; Gerenciamento de Quadras">
	<meta name="description" content="Gerencie seu centro esportivo com facilidade.">
	<meta name="keywords" content="Quadras, UEMG, Gerenciar, ToPlay">
	<meta name="author" content="GIMPS">
	<meta name="image" content="../../images/logo.png"> 
	<meta name="theme-color" content="#085e3b">
	<link rel="stylesheet" href="style.css">
	<link rel="icon" href="../../images/icone.ico">
</head>

<body>
    <span id="first"></span>
    <span id="second"></span>

    <main>
        
        <div class="container">
           <div class="menu">

                <div class="back">
                    <a href="../../inicio.html"><img src="img/back.svg" alt="Voltar"></a>
                </div>

                <!-- <div class="new-user">
                    <a id="flip-btn" onclick="flip(<?php echo $status; ?>)"><img src="img/user.svg" alt="Voltar"></a>
                </div> -->

                <section class="info-emp">
                    <img src="img/avatar.jpg" alt="ToPlay">
                    <h2><a id="h2-entrar">Entrar</a><br>
                        Sistema ToPlay</h2>
                </section>
                <hr>

                    <form action="" method="POST" onsubmit="handleFormSubmit(event)">
                <section class="input">

                        
                        <label for="user">E-mail ou usuário</label>
                        <input type="text" name="user" id="user" placeholder="Digite seu usuário" />

                        <label for="password">Senha</label>
                        <input type="password" name="password" id="password" placeholder="Digite sua senha" />
                </section>

                <label for="conected" id="con">
                    <input type="checkbox" name="conected" id="conected">&nbsp&nbspContinuar conectado
                </label>

                <a href="#" id="esqueci-senha">Esqueci minha senha</a>
    <span id="erro"><?php echo $status; ?></span>
                <input type="submit" value="Entrar" id="sub"></input>
                </form>
            </div>
        </div>

        <!-- <div class="rotate">

            <div class="new-user">
                <a onclick="flip()"><img src="img/login.svg" alt="Voltar"></a>
            </div>

            <section class="info-emp">
                <img src="img/avatar.jpg" alt="ToPlay">
                <h2><a id="h2-entrar">Cadastre-se</a><br>
                    Sistema ToPlay</h2>
            </section>
            <hr>

                <form action="submit" onsubmit="handleFormSubmit(event)">

            <section class="input">

                     
                    <label for="email-register">E-mail</label>
                    <input type="text" name="email-register" id="email-register" placeholder="Digite seu e-mail" />

                    <label for="user-register">Usuário</label>
                    <input type="text" name="user-register" id="user-register" placeholder="Digite seu usuário" />

                    <label for="password-register">Senha</label>
                    <input type="register" name="password-register" id="password-register" placeholder="Digite sua senha" />

                    <label for="confirmed-password">Confirme Senha</label>
                    <input type="password" name="confirmed-password" id="confirmed-password" placeholder="Confirme sua senha" />
            </section>

            <input type="submit" value="Cadastrar" id="sub-register" onclick="validaCampos()"></input>
            </form>
        </div>
    </div> -->

        <div class="alert">
            <h3 id="titulo-alert"></h3>
            <p id="texto-alert"></p>
            <section id="porc"></section>
        </div>
    </main>
    <script> 

        function flip(erra){
    alert(erra)
}
    </script>
</body>

</html>