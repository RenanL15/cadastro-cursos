<?php
    // session_start();
    
    // // Verifica se o usuário está logado
    // if (!isset($_SESSION['username'])) {
    //     header('location: login.php');
    //     exit;
    // }
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
    <link rel="stylesheet" href="css/lista.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Cursos</title>
  </head>
  <body>
      <div class="cursos-container">
          <div class="cursos-content">
            <h1>Cursos cadastrados</h1>
            <table class="table-cursos">
                <thead>
                    <th>Código</th>
                    <th>Curso</th>
                    <th>Duração</th>
                    <th>Valor</th>  
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
                    </tr>
                <?php
                        }
                    }
                ?>
            </table>
            <button onclick="location.href='admin.php'">Área de administrador</button>
        </div>
    </div>
  </body>
</html>
