<?php
    include 'banco.php';

    session_start();
    
    function gravar($conexao) {
        $sql = "
        INSERT INTO tb_cursos
        (cd_curso, nm_curso, vl_valor, dr_horas)
        VALUES
        (
            '{$_POST['code']}',
            '{$_POST['curso']}',
            {$_POST['valor']},
            {$_POST['duracao']}
            )";
            return mysqli_query($conexao, $sql);
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (gravar($conexao)) {
            header('location: admin.php');
        }
        else {
            echo 'Erro na gravação';
        }
    }
    
?>