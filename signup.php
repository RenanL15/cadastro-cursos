<?php

    include 'banco.php';

    session_start();

    //Validar o campo do email
    $email = $_POST['email'];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Email inválido";
        header('Location: error-signup.php');
        exit;
    }

    // Validar senha
    if (strlen($_POST['pass']) < 8) {
        $_SESSION['error'] = "A senha deve conter pelo menos 8 caracteres";
        header('Location: error-signup.php');
        exit;
    }

    // Verificar se as senhas são as mesmas
    if($_POST['pass'] !== $_POST['password-repeat']) {
        $_SESSION['error'] = "As senhas não se coincidem";
        header('Location: error-signup.php');
        exit;
    }

    $listagem = lista_cursos($conexao);
    function lista_cursos($conexao)
    {
        $sqlBusca = 'SELECT * FROM tb_users';
        $resultado = mysqli_query($conexao, $sqlBusca);
        return $resultado;
    }

    while ($dados = $listagem -> fetch_assoc()) {
        if ($_POST['user'] == $dados['nm_user']) {
            $_SESSION['error'] = "Usuário já existente";
            header('Location: error-signup.php');
            exit;
        }
        if ($_POST['email'] == $dados['nm_email']) {
            $_SESSION['error'] = "Email já está em uso";
            header('Location: error-signup.php');
            exit;
        }
    }
    function gravar($conexao) {
        $passHash = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $sql = "
        INSERT INTO tb_users
        (nm_user, nm_email, pw_user)
        VALUES
        (
            '{$_POST['user']}',
            '{$_POST['email']}',
            '{$passHash}'
            )";
            return mysqli_query($conexao, $sql);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (gravar($conexao)) {
            header('location: index.php');
        }
        else {
            echo 'Erro na gravação';
        }
    }

    header('location: login.php')

?>