<?php
    session_start();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['username'])) {
        header('location: index.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/cadastro.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Cadastro de Cursos</title>
  </head>
  <body>
    <div class="cadastro-container">
        <form class="main-form" action="create.php" method="post" autocomplete="on">
          <h1>Cadastrar curso</h1>
          <input type="number" name="code" placeholder="Código" required/>
          <input type="text" name="curso" id="" placeholder="Curso" required/>
          <input type="number" name="valor" placeholder="Valor" required/>
          <input type="number" name="duracao" placeholder="Duração" required/>
          <button type="submit">Cadastrar</button>
          <input id="btn-ver-cursos" type="button" value="Ver cursos" onclick="location.href='index.php'">
        </form>
    </div>
  </body>
</html>