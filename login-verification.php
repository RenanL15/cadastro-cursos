<?php

    session_start();

    include "banco.php";

    $listagem = lista_cursos($conexao);
    function lista_cursos($conexao)
    {
        $sqlBusca = 'SELECT * FROM tb_users';
        $resultado = mysqli_query($conexao, $sqlBusca);
        return $resultado;
    }


    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['user-email'];
        // Verifica se não está vazio user e pass
        if (empty($_POST['user-email']) || empty($_POST['password-login'])) {
            echo 'Nome de usuário e senha são obrigatórios';
            exit;
        }
        
        while ($dados = $listagem -> fetch_assoc()) {
            if (($_POST['user-email'] == $dados['nm_user'] || $_POST['user-email'] == $dados['nm_email']) && password_verify($_POST['password-login'], $dados['pw_user'])) {
                $_SESSION['username'] = $username;
                header('location: admin.php');
            }
            else {
                $_SESSION['error'] = "Email ou senha inválidos";
                header('location: error-login.php');
            }
        }
        
    }
?>