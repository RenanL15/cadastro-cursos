<?php

    session_start();

    include "banco.php";

    if (isset($_GET['id'])){
        if (deletar($conexao)){
            header('Location: admin.php');
        }
        else {
            echo "Erro na exclusão";
        }
    }
    else {
        header('Location: admin.php');
    }
    function deletar($conexao){
        $sql="
        DELETE FROM tb_cursos    
        WHERE
        cd_curso = '{$_GET['id']}'
        ";
        return mysqli_query($conexao, $sql);
    }
?>