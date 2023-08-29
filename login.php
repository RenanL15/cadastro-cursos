<?php

  session_start();
  
  if (!isset($_POST['username'])) {
    header('index.php');
  }

?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Cadastro de Cursos</title>
  </head>
  <body>
    <div class="login-container">
      <img src="./images/sign-up-vec.png" alt="cartoon-vector" width="500px" />
      <form class="main-form" action="login-verification.php" method="post" autocomplete="on">
        <h1>Login</h1>
        <input type="text" name="user-email" placeholder="Usuário/Email" required/>
        <input type="password" name="password-login" placeholder="Senha" required/>
        <button type="submit">Login</button>
        <a href="signup.html">Não tem uma conta? Cadastre-se aqui</a>
      </form>
    </div>
  </body>
</html>
