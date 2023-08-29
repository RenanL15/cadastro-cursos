<?php

    $bdServidor = '127.0.0.1';
    $bdUsuario = 'root';
    $bdSenha = '';
    $bdBanco = 'cursos_db';
    $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
    if (!$conexao) {
        echo "Problemas para conectar no banco. Verifique os dados!";
        die();
    }
?>