<?php
    session_start();
    
    include "banco.php";

    if ($_SERVER['REQUEST_METHOD']==='POST'){
        if (atualizar($conexao)){
            header('Location: admin.php');
        }
        else {
            echo "Erro na gravação";
        }
    }
    else {
        header('Location: admin.php');
    }
    function atualizar($conexao){
        $sql="
        UPDATE tb_cursos
        SET
            cd_curso = '{$_POST['cd-update']}',
            nm_curso = '{$_POST['nome-update']}',
            vl_valor = '{$_POST['valor-update']}',  
            dr_horas = '{$_POST['duracao-update']}'  
            WHERE
            cd_curso = '{$_SESSION['id']}'
        ";
        return mysqli_query($conexao, $sql);
    }
?>