<?php

    session_start();

    include 'banco.php';

    $_SESSION['id'] = $_GET['id'];

    if (isset($_SESSION['username'])) {
        $sql = "SELECT * FROM tb_cursos WHERE cd_curso = '{$_GET['id']}'";
        $result = mysqli_query($conexao, $sql);
    }
    else {
        header('Location: index.php');
    }

    while($dados = $result->fetch_assoc()) { 
        $cd = $dados['cd_curso']; 
        $nome = $dados['nm_curso'];
        $valor = $dados['vl_valor'];      
        $duracao = $dados['dr_horas'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/edit.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Editar</title>
</head>
<body>
    <div class="edit-container">
        <form class="main-form" action="update.php" method="post">
            <h1>Atualizar dados</h1>
            <input type="text" name="cd-update" id="<?php echo $cd; ?>" value="<?php echo $cd; ?>" placeholder="Código" required>
            <input type="text" name="nome-update" value="<?php echo $nome ?>" placeholder="Nome" required>
            <input type="text" name="valor-update" value="<?php echo $valor ?>" placeholder="Valor" required>
            <input type="text" name="duracao-update" value="<?php echo $duracao ?>" placeholder="Duração" required>
            <button type="submit">Atualizar</button>
            <input id="btn-voltar" type="button" value="Voltar" onclick="location.href='admin.php'">
        </form>
    </div>
</body>
</html>