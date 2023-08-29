<?php
    session_start();

    // Verifica se o usuário está logado
    if (!isset($_SESSION['username'])) {
        header('location: login.php');
        exit;
    }
    include "banco.php";

    $listagem = lista_cursos($conexao);
    function lista_cursos($conexao)
    {
        $sqlBusca = 'SELECT * FROM tb_cursos';
        $resultado = mysqli_query($conexao, $sqlBusca);
        return $resultado;
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/lista.css">
    <title>Cursos</title>
  </head>
  <body>
      <div class="cursos-container">
        <div class="cursos-content">
            <h1>Área de administração</h1>
            <table class="table-cursos">
                <thead>
                    <th>Código</th>
                    <th>Curso</th>
                    <th>Duração</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </thead>
                <?php
                    if ($listagem -> num_rows > 0) {
                    while ($dados = $listagem -> fetch_assoc()) {
                ?>
                    <!-- Loop -->
                    <tr class="dados-tr">
                        <th><?php echo $dados['cd_curso'];?></td>
                        <td><?php echo $dados['nm_curso'];?></td>
                        <td><?php echo $dados['dr_horas'] . "h";?></td>
                        <td><?php echo "R$" . str_replace(".", ",", $dados['vl_valor']);?></td>
                        <td><a id="edit-link" href="edit.php?id=<?php echo $dados['cd_curso'];?>">editar</a></td>
                        <td><a id="delete-link" onclick="return confirm('Você tem certeza que deseja deletar esse curso?')" href="delete.php?id=<?php echo $dados['cd_curso'];?>">deletar</a></td>  
                    </tr>
                <?php
                        }
                    }
                ?>
            </table>
            <div class="buttons">
                <button onclick="location.href='cadastro.php'">Adicionar curso</button>
                <form action="logout.php">
                    <button id="btn-sair-admin">Sair da administração</button>
                </form>
            </div>
        </div>
    </div>
  </body>
</html>
